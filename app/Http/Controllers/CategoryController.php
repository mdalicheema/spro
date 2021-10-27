<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\CssSelector\Node\FunctionNode;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allCat()
    {
        // $categories = DB::table('categories')
        //               ->join('users', 'categories.user_id', 'users.id')
        //               ->select('categories.*', 'users.name')
        //               ->latest()->paginate(5);
        // $categories = Category::all();
        // $categories = Category::latest()->get();
        $categories = Category::latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);
        // $categories = DB::table('categories')->latest()->get();
        // $categories = DB::table('categories')->latest()->paginate(5);
        return view('admin.category.index', compact('categories', 'trashCat'));
    }
    public function addCat(Request $request)
    {
        $addCat = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255',
            ],
            [
                'category_name.required' => 'The Category input required',
                'category_name.unique' => 'The Category field must be unique',
                'category_name.max' => 'The Category must less than 255Chars',
            ]
        );

        // Category::insert($addCat);
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        // $category = new Category();
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);

        return redirect()->back()->with('success', 'Category Created Successfuly!');
    }
    public function editCat($id){
       $category = DB::table('categories')->where('id', $id)->first();
    //    $category = Category::find($id);
       return view('admin.category.edit', compact('category'));
    }
    public function updateCat(Request $request, $id){
        
        // <-- Eloquent Model (ORM) --> 

        $update = Category::find($id);
        $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255',
            ],
            [
                'category_name.required' => 'The Category input required',
                'category_name.unique' => 'The Category field must be unique',
                'category_name.max' => 'The Category must less than 255Chars',
            ]
            );
            $update->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);

        // <-- Query Builder -->
        
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->where('id', $id)->update($data);

        return redirect()->route('all.category')->with('success', 'Category Updated Successfuly!');

    }
    public function softDelCat($id){
        $del = Category::find($id)->delete();
        return redirect()->back()->with('success', 'Categroy Soft Deleted Successfuly!');
    }

    public function restoreCat($id){
        $restore = Category::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Categroy Restored Successfuly!');
    }

    public function permaDelete($id){
        $pdel = Category::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Categroy Permanent Deleted Successfuly!');
    }
}

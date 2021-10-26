<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\\Input;
use App\Models\Brand;

class BrandController extends Controller
{
    public function allBrand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function storeBrand(Request $request)
    {
        $addCat = $request->validate(
            [
                'brand_name' => 'required|unique:brands|min:4',
                'brand_image' => 'mimes:jpg,jpeg,png',
            ],
            [
                'brand_name.required' => 'The brand input required',
                'brand_image.min' => 'please attach image first',
            ]
        );

        // upload image into localhost public folder
        // $brand_image = $request->brand_image->getClientOriginalName();
        // if ($request->hasFile('brand_image')) {
        //     dd('th is is yes');
        // } else {
        //     dd('this is not');
        // }
        // $abc = Input::file('brand_image');
        // dd($abc);
        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $image_ext = strtolower($brand_image->getClientOriginalExtension());
        // dd($image_ext);
        $img_name = $name_gen . '.' . $image_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location . $img_name;
        $brand_image->move($up_location, $img_name);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success', 'Brand Created Successfuly!');
    }

    public function edit($id){
         $brand = Brand::find($id);
         return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'brand_name' => 'required|min:4',
            // 'brand_image' => 'mimes:jpg,jpeg,png',
        ],[
            'brand_name.required' => 'plz enter brand name',
            // 'brand_image.required' => 'brand image required!',
        ]);

        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');
        if($brand_image){
            $name_gen = hexdec(uniqid());
            $image_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $image_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location . $img_name;
            $brand_image->move($up_location, $img_name);
            
            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('success', 'Brand Updated Successfuly!');
        }else{ 
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('success', 'Brand Updated Successfuly!');
        }
    }
    public function destroy($id){
        $img = Brand::find($id);
        $old_image = $img->brand_image;
        unlink($old_image);
        
        Brand::find($id)->delete();
        return redirect()->back()->with('success', 'Brand Deleted Successfuly!');
    }
}

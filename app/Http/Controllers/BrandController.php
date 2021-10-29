<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
// use Illuminate\Support\\Input;
use App\Models\Brand;
use App\Models\Multipics;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        // upload image into localhost public/image/brand etc. folder

        $brand_image = $request->file('brand_image');

        // dd($brand_image->getClientOriginalExtension());
        // $thumbnailImage = Image::make($brand_image);
        // $thumbnailPath = public_path().'/image/thumbnail/';
        // $originalPath = public_path().'/image/brand/';
        // $thumbnailImage->save($originalPath.time().$brand_image->getClientOriginalName());
        // $thumbnailImage->resize(150,150);
        // $thumbnailImage->save($thumbnailPath.time().$brand_image->getClientOriginalName());

        // $imageModel = new Brand();
        // $imageModel->brand_image = time().$brand_image->getClientOriginalName();
        // $imageModel->brand_name = $request->brand_name;
        // $imageModel->save();

        // $name_gen = hexdec(uniqid());
        // $image_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen . '.' . $image_ext;
        // $up_location = 'image/brand/';
        // $last_img = $up_location . $img_name;
        // $brand_image->move($up_location, $img_name);

        //image intervention
        $name_gen = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300, 200)->save('image/brand/' . $name_gen);
        $last_img = 'image/brand/' . $name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success', 'Brand Created Successfuly!');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_name' => 'required|min:4',
            // 'brand_image' => 'mimes:jpg,jpeg,png',
        ], [
            'brand_name.required' => 'plz enter brand name',
            // 'brand_image.required' => 'brand image required!',
        ]);

        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');
        if ($brand_image) {

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
        } else {
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('success', 'Brand Updated Successfuly!');
        }
    }
    public function destroy($id)
    {
        $img = Brand::find($id);
        $old_image = $img->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();
        return redirect()->back()->with('success', 'Brand Deleted Successfuly!');
    }

    //multipics functions 
    public function multpic()
    {
        return view('admin.multipic.index');
    }

    public function storeImage(Request $request)
    {
        // upload image into localhost public/image/brand etc. folder

        $image = $request->file('image');

        foreach ($image as $multi_img) {
            $name_gen = hexdec(uniqid()) . '.' . $multi_img->getClientOriginalExtension();
            Image::make($multi_img)->resize(500, 300)->save('image/multi/' . $name_gen);

            $last_img = 'image/multi/' . $name_gen;

            Multipics::insert([
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
        }

        return redirect()->back()->with('success', 'Brand Created Successfuly!');
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'User Logout');
    }
}

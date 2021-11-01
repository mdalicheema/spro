<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }
 
    public function add(){

        return view('admin.slider.add');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function store(Request $request)
    {
        $slider = $request->validate(
            [
                'title' => 'required|max: 20',
                'description' => 'required|min: 10',
                'image' => 'required|mimes: jpg,jpeg,png',
            ],
            [
                'title.required' => 'Title is required!',
                'description.required' => 'description is required!',
                'description.min' => 'minimum 10 characters allowed for description!',
                'image.required' => 'Image is required!',
            ]
        );


        //image intervention
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(400, 400)->save('image/slider/' . $name_gen);
        $last_img = 'image/slider/' . $name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('home.slider')->with('success', 'Slider Created Successfuly!');
    }

    public function update(Request $request, $id)
    {

       $slid = $request->validate(
            [
                'title' => 'required|max: 20',
                'description' => 'required|min: 10',
                'image' => 'mimes: jpg,jpeg,png',
            ],
            [
                'title.required' => 'Title is required!',
                'description.required' => 'description is required!',
                'description.min' => 'minimum 10 characters allowed for description!',
                // 'image.required' => 'Image is required!',
            ]
        );

        $old_image = $request->old_image;
        $image = $request->file('image');
        if ($image) {

            $name_gen = hexdec(uniqid());
            $image_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $image_ext;
            $up_location = 'image/slider/';
            $last_img = $up_location . $img_name;
            $image->move($up_location, $img_name);

            unlink($old_image);
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('home.slider')->with('success', 'Slider Updated Successfuly!');
        } else {
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('home.slider')->with('success', 'Slider Updated Successfuly!');
        }
    }

    public function destroy($id)
    {
        $img = Slider::find($id);
        $old_image = $img->image;
        unlink($old_image);

        Slider::find($id)->delete();
        return redirect()->back()->with('success', 'Slider Deleted Successfuly!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Multipics;
use App\Models\Service;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function index(){
        $about = About::first();
        return view('pages.about', compact('about'));
    }
    public function aboutIndex(){
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }
    public function aboutCreate(){
        return view('admin.about.add');
    }

    public function aboutStore(Request $request){
        $request->validate([
            'name' => 'required',
            'short_info' => 'required',
            'long_info' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'short_info.required' => 'Short info is required',
            'long_info.required' => 'Long info is required',
        ]);
        About::insert([
            'name' => $request->name,
            'short_info' => $request->short_info,
            'long_info' => $request->long_info,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.about')->with('success', 'About added Successfuly!');
    }

    public function aboutEdit($id){
        $about = About::find($id);
        return view('admin.about.edit', compact('about'));
    }

    public function aboutUpdate(Request $request, $id){
        About::find($id)->update([
            'name' => $request->name,
            'short_info' => $request->short_info,
            'long_info' => $request->long_info,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.about')->with('success', 'About Updated Successfuly!');
    }

    public function destroy($id){
        About::find($id)->delete();
        return redirect()->route('admin.about')->with('success', 'About Deleted Successfuly!');
    }

    public function portfolio(){
        $images = Multipics::all();
        return view('pages.portfolio', compact('images'));
    }

    public function serviceIndex(){
        $services = Service::all();
        return view('admin.portfolio.service', compact('services'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    public function serviceIndex(){
        $services = Service::all();
        return view('admin.portfolio.service', compact('services'));
    }

    public function service(){
        $services = Service::first();
        return view('pages.service', compact('services'));
    }

    public function serviceHome(){
        $services = Service::first();
        return view('pages.service', compact('services'));
    }

    public function create(){
        return view('admin.service.add');
    }
    public function store(Request $request){
        $request->validate([
            'short_info' => 'required',
            'dribbble' => 'required',
            'dribbble_des' => 'required',
            'file' => 'required',
            'file_des' => 'required',
            'tachometer' => 'required',
            'tachometer_des' => 'required',
            'layer' => 'required',
            'layer_des' => 'required',
            'slideshow' => 'required',
            'slideshow_des' => 'required',
            'arch' => 'required',
            'arch_des' => 'required',
        ],
        [
            'short_info.required' => 'short_info is required',
            'dribbble.required' => 'dribbble is required',
            'dribbble_des.required' => 'dribbble_des is required',
            'file.required' => 'file is required',
            'file_des.required' => 'file_des is required',
            'tachometer.required' => 'tachometer is required',
            'tachometer_des.required' => 'tachometer_des is required',
            'layer.required' => 'layer is required',
            'layer_des.required' => 'layer_des is required',
            'slideshow.required' => 'slideshow is required',
            'slideshow_des.required' => 'slideshow_des is required',
            'arch.required' => 'arch is required',
            'arch_des.required' => 'arch_des is required',
        ]);
        
         Service::insert([
            'short_info' => $request->short_info,
            'dribbble' => $request->dribbble,
            'dribbble_des' => $request->dribbble_des,
            'file' => $request->file,
            'file_des' => $request->file_des,
            'tachometer' => $request->tachometer,
            'tachometer_des' => $request->tachometer_des,
            'layer' => $request->layer,
            'layer_des' => $request->layer_des,
            'slideshow' => $request->slideshow,
            'slideshow_des' => $request->slideshow_des,
            'arch' => $request->arch,
            'arch_des' => $request->arch_des,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('addser')->with('success', 'Service Added Successfuly!');
    }

    public function edit($id){
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'short_info' => 'required',
            'dribbble' => 'required',
            'dribbble_des' => 'required',
            'file' => 'required',
            'file_des' => 'required',
            'tachometer' => 'required',
            'tachometer_des' => 'required',
            'layer' => 'required',
            'layer_des' => 'required',
            'slideshow' => 'required',
            'slideshow_des' => 'required',
            'arch' => 'required',
            'arch_des' => 'required',
        ],
        [
            'short_info.required' => 'short_info is required',
            'dribbble.required' => 'dribbble is required',
            'dribbble_des.required' => 'dribbble_des is required',
            'file.required' => 'file is required',
            'file_des.required' => 'file_des is required',
            'tachometer.required' => 'tachometer is required',
            'tachometer_des.required' => 'tachometer_des is required',
            'layer.required' => 'layer is required',
            'layer_des.required' => 'layer_des is required',
            'slideshow.required' => 'slideshow is required',
            'slideshow_des.required' => 'slideshow_des is required',
            'arch.required' => 'arch is required',
            'arch_des.required' => 'arch_des is required',
        ]);

         Service::find($id)->update([
            'short_info' => $request->short_info,
            'dribbble' => $request->dribbble,
            'dribbble_des' => $request->dribbble_des,
            'file' => $request->file,
            'file_des' => $request->file_des,
            'tachometer' => $request->tachometer,
            'tachometer_des' => $request->tachometer_des,
            'layer' => $request->layer,
            'layer_des' => $request->layer_des,
            'slideshow' => $request->slideshow,
            'slideshow_des' => $request->slideshow_des,
            'arch' => $request->arch,
            'arch_des' => $request->arch_des,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('addser')->with('success', 'Service Updated Successfuly!');
    }

    public function destroy($id){
        Service::find($id)->delete();
        return redirect()->route('addser')->with('success', 'Service Deleted Successfuly!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCat(){
        return view('admin.category.index');
    }
    public function addCat(Request $request){
       $addCat = $request->validate([
           'category_name' => 'required|unique:categories|max:255',
       ],
       [
        'category_name.required' => 'The Category input required',
        'category_name.unique' => 'The Category field must be unique',
        'category_name.max' => 'The Category must less than 255Chars',
       ]);
    }
}

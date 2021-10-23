<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('midd.set');
    }
    
    public function cal()
    {
        return view('midd.cal');
    }

    public function role()
    {
        return view('midd.crm');
    }

}

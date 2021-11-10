<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTable;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request){
        $books = Book::latest()->get();



    }
}

<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/set', [ContactController::class, 'index']);
Route::get('/manage', [ContactController::class, 'cal']);
Route::get('/crm-roles', [ContactController::class, 'role'])->name('con');


Route::get('/home-second', function () {
    return view('midd.home1');
});
Route::get('/home', function () {
    return view('midd.home');
});
Route::get('/about', function () {
    return view('midd.about');
})->middleware('age');

Route::middleware('lang')->group(function () {
    Route::get('/contact', function () {
        return view('midd.contact');
    });
    Route::get('/products', function () {
        return view('midd.products');
    });
    Route::get('/list-items', function () {
        return view('midd.list');
    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    $users = DB::table('users')->get();
    return view('dashboard', compact('users'));
})->name('dashboard');


//Category Controller
Route::get('/category/all', [CategoryController::class, 'allCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'addCat'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'editCat']);
Route::get('/category/update/{id}', [CategoryController::class, 'updateCat']);
Route::get('/category/softDelete/{id}', [CategoryController::class, 'softDelCat']);
Route::get('/category/restore/{id}', [CategoryController::class, 'restoreCat']);
Route::get('/category/pdelete/{id}', [CategoryController::class, 'permaDelete']);

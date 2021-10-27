<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

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
    // $users = DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');


//Category Controller
Route::get('/category/all', [CategoryController::class, 'allCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'addCat'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'editCat']);
Route::get('/category/update/{id}', [CategoryController::class, 'updateCat']);
Route::get('/category/softDelete/{id}', [CategoryController::class, 'softDelCat']);
Route::get('/category/restore/{id}', [CategoryController::class, 'restoreCat']);
Route::get('/category/pdelete/{id}', [CategoryController::class, 'permaDelete']);

//Category Controller
Route::get('/brand/all', [BrandController::class, 'allBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'storeBrand'])->name('brand.store');
Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'destroy']);

//Multi Pictures 
Route::get('/multi/images', [BrandController::class, 'multpic'])->name('all.images');
Route::post('/multi/add', [BrandController::class, 'storeImage'])->name('image.store');

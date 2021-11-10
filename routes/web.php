<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ChangePassController;
use App\Http\Controllers\PostController;
// use App\Models\User;
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
    $brands = DB::table('brands')->latest()->paginate(5);
    $about = DB::table('abouts')->first();
    $services = DB::table('services')->first();
    $images = DB::table('multipics')->get();
    $contacts = DB::table('contacts')->first();
    return view('home', compact('brands','about','images', 'services'));
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

//Admin
Route::get('/admin', [HomeController::class, 'admin'])->name('admin');

//Admin Multi Pictures 
Route::get('/multi/images', [BrandController::class, 'multpic'])->name('all.images');
Route::post('/multi/add', [BrandController::class, 'storeImage'])->name('image.store');

//Home Slider Routes
Route::get('/home/slider', [HomeController::class, 'index'])->name('home.slider');
Route::get('/slider/add', [HomeController::class, 'add'])->name('slider.add');
Route::post('/slider/store', [HomeController::class, 'store'])->name('slider.store');
Route::get('/slider/edit/{id}', [HomeController::class, 'edit']);
Route::post('/slider/update/{id}', [HomeController::class, 'update'])->name('slider.update');
Route::get('/slider/delete/{id}', [HomeController::class, 'destroy']);

//Admin About Us
Route::get('/admin/about', [AboutController::class, 'aboutIndex'])->name('admin.about');
Route::get('/about/create', [AboutController::class, 'aboutCreate'])->name('about.add');
Route::post('/about/store', [AboutController::class, 'aboutStore'])->name('about.store');
Route::get('/about/edit/{id}', [AboutController::class, 'aboutEdit']);
Route::post('/about/update/{id}', [AboutController::class, 'aboutUpdate']);
Route::get('/about/delete/{id}', [AboutController::class, 'destroy']);

//Admin Services
Route::get('/admin/service', [ServiceController::class, 'index'])->name('addser');
Route::get('/service/create', [ServiceController::class, 'create'])->name('service.add');
Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');
Route::get('/service/edit/{id}', [ServiceController::class, 'edit']);
Route::post('/service/update/{id}', [ServiceController::class, 'update']);
Route::get('/service/delete/{id}', [ServiceController::class, 'destroy']);

//All Dynamic Pages Route
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/portfolio', [AboutController::class, 'portfolio'])->name('portfolio');
Route::get('/service', [ServiceController::class, 'service'])->name('service');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

//Contact 
Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.add');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact/edit/{id}', [ContactController::class, 'edit']);
Route::post('/contact/update/{id}', [ContactController::class, 'update']);
Route::get('/contact/delete/{id}', [ContactController::class, 'destroy']);

//Contact Form
Route::post('/contact/store', [ContactController::class, 'ContactForm'])->name('contact.store');

//update password
Route::get('/password/update', [ChangePassController::class, 'AdminPass'])->name('password.reset');
Route::post('/password/update', [ChangePassController::class, 'AdminPassStore'])->name('password.update');

//admin posts routes
Route::get('posts', [PostController::class, 'index']);
Route::post('post', [PostController::class, 'store'])->name('post.sotre');
Route::put('post', [PostController::class, 'update']);
Route::delete('post/{post_id}', [PostController::class, 'destroy']);

//admin todos routes
Route::get('/', [TodoController::class, 'index']);
Route::resource('todo', TodoController::class);
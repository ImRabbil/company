<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
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
    $brands = DB::table('brands')->get();
        return view('home', compact('brands'));
});

// Route::get('/dataInsert', [HomeController::class, 'index'])->name('dataInsert');
// Route::post('/', [HomeController::class, 'store'])->name('DataStore');


// all category route
Route::get('/all/category',[CategoryController::class,'index'])->name('all.category');
Route::post('/add/category',[CategoryController::class,'store'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class,'edit']);
Route::post('/category/update/{id}',[CategoryController::class,'update']);
Route::get('/category/softdelete/{id}',[CategoryController::class,'softdelete']);
Route::get('/category/restore/{id}',[CategoryController::class,'restore']);
Route::get('/category/pdelete/{id}',[CategoryController::class,'pdelete']);



/// Brand Route
Route::get('/all/brand',[BrandController::class,'index'])->name('all.brand');
Route::post('/add/brand',[BrandController::class,'store'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'edit']);
Route::post('/brand/update/{id}',[BrandController::class,'update']);
Route::get('/brand/delete/{id}',[BrandController::class,'delete']);



//// multi picture
Route::get('/all/multi',[BrandController::class,'Multi'])->name('all.multi');
Route::post('/add/multi',[BrandController::class,'mStore'])->name('store.multi');











// slider route 
Route::get('/all/slider',[HomeController::class,'Slider'])->name('home.slider');
Route::get('/add/slider',[HomeController::class,'add_slider'])->name('add.slider');
Route::post('/store/slider',[HomeController::class,'Slider_Store'])->name('store.slider');
Route::get('/slider/edit/{id}',[HomeController::class,'edit']);
Route::post('/slider/update/{id}',[HomeController::class,'update']);
Route::get('/slider/delete/{id}',[HomeController::class,'delete']);










Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        // $users = User::all();


        // $users = User::all();
        // return view('dashboard', compact('users'));


        //new project
        return view('admin.index');
    })->name('dashboard');
});

//logout route
Route::get('/user/logout',[BrandController::class,'logout'])->name('user.logout');
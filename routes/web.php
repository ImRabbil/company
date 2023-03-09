<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;


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





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        $users = User::all();
        return view('dashboard', compact('users'));
    })->name('dashboard');
});

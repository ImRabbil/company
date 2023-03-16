<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AboutController;
use App\Models\Multipic;
use App\Models\Contact;
use App\Models\TeamAbout;
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
    $about = DB::table('abouts')->first();
    $service = DB::table('services')->get();
    $multi = Multipic::all();
    

    return view('home', compact('brands', 'about','service','multi'));
})->name('home');

// Route::get('/dataInsert', [HomeController::class, 'index'])->name('dataInsert');
// Route::post('/', [HomeController::class, 'store'])->name('DataStore');


// all category route
Route::get('/all/category', [CategoryController::class, 'index'])->name('all.category');
Route::post('/add/category', [CategoryController::class, 'store'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'update']);
Route::get('/category/softdelete/{id}', [CategoryController::class, 'softdelete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'restore']);
Route::get('/category/pdelete/{id}', [CategoryController::class, 'pdelete']);



/// Brand Route
Route::get('/all/brand', [BrandController::class, 'index'])->name('all.brand');
Route::post('/add/brand', [BrandController::class, 'store'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'delete']);



//// multi picture
Route::get('/all/multi', [BrandController::class, 'Multi'])->name('all.multi');
Route::post('/add/multi', [BrandController::class, 'mStore'])->name('store.multi');
Route::get('/multi/delete/{id}', [BrandController::class, 'M_delete']);











// slider route 
Route::get('/all/slider', [HomeController::class, 'Slider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'add_slider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'Slider_Store'])->name('store.slider');
Route::get('/slider/edit/{id}', [HomeController::class, 'edit']);
Route::post('/slider/update/{id}', [HomeController::class, 'update']);
Route::get('/slider/delete/{id}', [HomeController::class, 'delete']);


//all  adimn about route here..........................................
Route::get('/all/about', [AboutController::class, 'About'])->name('home.about');
Route::get('/add/about', [AboutController::class, 'add_about'])->name('add.about');
Route::post('/store/about', [AboutController::class, 'About_Store'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'edit']);
Route::post('/about/update/{id}', [AboutController::class, 'update']);
Route::get('/about/delete/{id}', [AboutController::class, 'delete']);
Route::get('/about/testimonials', [AboutController::class, 'testimonials'])->name('about_testimonials');
Route::post('/store/team-testimonials', [AboutController::class, 'Team_Testimonials_Store'])->name('store_team_testimonials');




////// team about route here=====================
Route::get('/team/about', [AboutController::class, 'TeamAbout'])->name('team.about');
Route::post('/store/team-about', [AboutController::class, 'Team_About_Store'])->name('store_team_about');


///all fontend about route here=====================================

Route::get('/about/pages', [AboutController::class, 'Fontend_About'])->name('fontend.about.pages');
Route::get('/about/pages/team', [AboutController::class, 'Fontend_About_team'])->name('fontend.about.team');
Route::get('/about/pages/testimonials', [AboutController::class, 'Fontend_About_team_testimonial'])->name('fontend.about.testimonials');
Route::get('/about/pages/testimonials/{id}', [AboutController::class, 'About_team_testimonial'])->name('edit.testimonials');
Route::post('/update/team-testimonial/{id}', [AboutController::class, 'testimonial_Update'])->name('update_store_test');











// all services route in here-------------------------------------------------------------
Route::get('/all/service', [ServiceController::class, 'Service'])->name('home.service');
Route::get('/add/service', [ServiceController::class, 'Add_Service'])->name('add.service');
Route::post('/store/service', [ServiceController::class, 'Service_Store'])->name('store.service');
Route::get('/service/edit/{id}', [ServiceController::class, 'edit']);
Route::post('/service/update/{id}', [ServiceController::class, 'update']);
Route::get('/service/delete/{id}', [ServiceController::class, 'delete']);




/// multi picture for portfolio====================================================
Route::get('/all/multi', [BrandController::class, 'Multi'])->name('all.multi');
Route::post('/add/multi', [BrandController::class, 'mStore'])->name('store.multi');








//// portfolio route-------
Route::get('/portfolio', [BrandController::class, 'p_index'])->name('profolio');





/// admin contact route here========================================
Route::get('admin/contact', [ContactController::class, 'Contact_View'])->name('admin.contact');
Route::get('/add/contact', [ContactController::class, 'Add_Contact'])->name('add_contact');
Route::post('/store/contact', [ContactController::class, 'Contact_Store'])->name('store.contact');



/// fontend contact route here=====================================
Route::get('fon/contact', [ContactController::class, 'Fon_Contact_View'])->name('fontend.contact');
Route::post('contact/form', [ContactController::class, 'Contact_Form'])->name('contact.form');
Route::get('contact/msg', [ContactController::class, 'Contact_Msg'])->name('contact.msg');









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
Route::get('/user/logout', [BrandController::class, 'logout'])->name('user.logout');

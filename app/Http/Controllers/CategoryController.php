<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\FlareClient\View;

class CategoryController extends Controller
{
    public function index()
   {
    // $categories = DB::table('categories')->join('users', 'users.id', '=', 'categories.user_id')
    //                                     ->select('categories.*', 'users.name')->get()->paginate(5);
    // 
    
    $categories = Category::latest()->paginate(5);
    // $trashCat = DB::table()
    $trashCat = Category::onlyTrashed()->latest()->paginate(3);
    return view('admin.category.index',compact('categories','trashCat'));
   }
   public function store(Request $rsqt)
   {
    $validated = $rsqt->validate([
        'category_name' => 'required|unique:categories|max:255',
    ]);

    Category::insert([
        'category_name' => $rsqt->category_name,
        'user_id' => Auth::user()->id,
        'created_at' => Carbon::now()
    ]);
    return redirect()->back();
   }

   public function edit($id){
    // $categories = DB::table('categories')->get();
    $categories = Category::find($id);
    return view('admin.category.edit',compact('categories'));
   }

   public function update(Request $request,$id){
    $update = Category::find($id)->update([
        'category_name' => $request->category_name,
        'user_id' => Auth::user()->id
    ]);
    return redirect()->route('all.category');
   }

   public function softdelete($id){
    $delete = Category::find($id)->delete();
    return redirect()->back();
   }

   public function restore($id){
    $delete = Category::withTrashed()->find($id)->restore();
    return redirect()->back();
   }

   public function pdelete($id){
    $delete = Category::withTrashed()->find($id)->forceDelete();
    return redirect()->back();
   }




}

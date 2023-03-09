<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            'brand_image' => 'required',
        ]);

        $brand_image = $request->file('brand_image');
        $img_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $img_gen . '.' . $img_ext;
        $up_location = 'image/brand';
        $brand_image->move($up_location, $img_name);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $img_name,
            'created_at' => Carbon::now()
        ]);


        return redirect()->back();
    }
}

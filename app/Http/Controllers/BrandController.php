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
        return view('admin.brand.index', compact('brands'));
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

    public function edit($id)
    {

        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        {
            $validated = $request->validate([
                'brand_name' => 'required|max:255',

            ]);
            // $brand = Brand::find($id);
            // $img_name = $brand->brand_image;
                $old_image = $request->old_image;
                $brand_image = $request->file('brand_image');
                if($brand_image){
                    $img_gen = hexdec(uniqid());
                    $img_ext = strtolower($brand_image->getClientOriginalExtension());
                    $img_name = $img_gen . '.' . $img_ext;
                    $up_location = 'image/brand';
                    $brand_image->move($up_location, $img_name);
                    unlink('image/brand/' . $old_image);
                
    
                Brand::find($id)->update([
                    'brand_name' => $request->brand_name,
                    'brand_image' => $img_name,
                    'created_at' => Carbon::now()
                ]);

                }else{
                    Brand::find($id)->update([
                        'brand_name' => $request->brand_name,
                        'created_at' => Carbon::now()
                    ]);

                }
               


            return redirect()->route('all.brand');
        }
    }


    public function delete($id){
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink('image/brand/'.$old_image);


        Brand::find($id)->delete();
        return redirect()->back();


    }
}

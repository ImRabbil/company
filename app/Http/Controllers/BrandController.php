<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Multipic;
use Carbon\Carbon;
use Image;

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
            if ($brand_image) {
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
            } else {
                Brand::find($id)->update([
                    'brand_name' => $request->brand_name,
                    'created_at' => Carbon::now()
                ]);
            }



            return redirect()->route('all.brand');
        }
    }


    public function delete($id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink('image/brand/' . $old_image);


        Brand::find($id)->delete();
        return redirect()->back();
    }



    public function Multi()
    {
        $multi = Multipic::all();
        return view('admin.multi.index',compact('multi'));
    }
    public function mStore(Request $request)
    {
        $image = $request->file('image');
        foreach( $image as $multi_img){
            $name_gen = hexdec(uniqid()) . '.' . $multi_img->getClientOriginalExtension();
        Image::make($multi_img)->resize(300, 200)->save('image/multi/' . $name_gen);
        $last_img = 'image/multi/' . $name_gen;
        Multipic::insert([
            'image' => $last_img,
            'created_at' => Carbon::now()


        ]);

        }
        

        return redirect()->back();
    }
}

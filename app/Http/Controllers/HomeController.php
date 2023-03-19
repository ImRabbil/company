<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Slider;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function Slider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));

    }

    public function add_slider(){
        return view('admin.slider.create');
        
    }

    public function Slider_Store(Request $request){
        

        $image = $request->file('image');
        $img_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $img_gen . '.' . $img_ext;
        $up_location = 'image/slider';
        $image->move($up_location, $img_name);

        Slider::insert([
            'title' => $request->title,
            'description'=>$request->description,
            'image' => $img_name,
            'created_at' => Carbon::now()
        ]);


        return redirect()->route('home.slider');

    }

    public function edit($id){
        $slider = Slider::find($id);
        // dd($slider->all());
        return view('admin.slider.edit',compact('slider'));


    }
    public function update(Request $request, $id)
    {
       
        {
            
            $old_image = $request->old_image;
            $image = $request->file('image');
            if ($image) {
                $img_gen = hexdec(uniqid());
                $img_ext = strtolower($image->getClientOriginalExtension());
                $img_name = $img_gen . '.' . $img_ext;
                $up_location = 'image/slider';
                $image->move($up_location, $img_name);
                unlink('image/slider/' . $old_image);


                Slider::find($id)->update([
                    'title' => $request->title,
                    'description'=>$request->description,
                    'image' => $img_name,
                    'created_at' => Carbon::now()
                ]);
            } else {
                Slider::find($id)->update([
                    'title' => $request->title,
                    'description'=>$request->description,
                    'created_at' => Carbon::now()
                ]);
            }



            return redirect()->route('home.slider');
        }
    }

    public function delete($id){
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink('image/slider/' . $old_image);


        Slider::find($id)->delete();
        return redirect()->back();
    }

   

}

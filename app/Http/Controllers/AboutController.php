<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\About;
use Illuminate\Http\Request;
use App\Models\TeamAbout;
use DB;
use App\Models\Brand;
use App\Models\Testimonials;

class AboutController extends Controller
{
    public function About()
    {
        $about = About::latest()->get();
        return view('admin.about.index', compact('about'));
    }
    public function add_about()
    {
        return view('admin.about.create');
    }
    public function About_Store(Request $request)
    {
        About::insert([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('home.about');
    }

    public function edit($id)
    {
        $about = About::find($id);
        return view('admin.about.edit', compact('about'));
    }
    public function update(Request $request, $id)
    {
        $update = About::find($id)->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ]);
        return redirect()->route('home.about');
    }
    public function delete($id){
        $delete = About::find($id)->delete();
    return redirect()->back();
    }

    public function Fontend_About(){
        $about = About::latest()->first();
        $team = TeamAbout::latest()->get();
        // dd($team->all());
        $brands = Brand::latest()->get();

        return view('fontend.about.index',compact('about','team','brands'));
    }


    public function TeamAbout(){
                $about = TeamAbout::latest()->get();
        return view('admin.TeamAbout.index',compact('about'));
    }

    
    public function Team_About_Store(Request $request){
        {
            
            $image = $request->file('image');
            $img_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $img_gen . '.' . $img_ext;
            $up_location = 'image/team';
            $image->move($up_location, $img_name);
    
            TeamAbout::insert([
                'name' => $request->name,
                'image' => $img_name,
                'designation' => $request->designation,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twiter' => $request->twiter,
                'linkdin' => $request->linkdin,
                'created_at' => Carbon::now()
            ]);
    
    
            return redirect()->back();
        }
    }


    public function Fontend_About_team(){
        $teams = TeamAbout::latest()->get();
        return view('fontend.about.team_index',compact('teams'));
    }
    public function Fontend_About_team_testimonial(){
        $test = Testimonials::latest()->get();

        return view('fontend.about.testimonials_index',compact('test'));

    }
    public function testimonials(){
        $test = Testimonials::latest()->get();
        return view('admin.about.testimonials_index',compact('test'));

    }

    public function Team_Testimonials_Store(Request $request){
        $image = $request->file('image');
            $img_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $img_gen . '.' . $img_ext;
            $up_location = 'image/testimonials';
            $image->move($up_location, $img_name);
    
            Testimonials::insert([
                'name' => $request->name,
                'image' => $img_name,
                'designation' => $request->designation,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);
    
    
            return redirect()->back();


    }

    public function testimonial_Update(Request $request, $id){
        {
            
            $old_image = $request->old_image;
            $image = $request->file('image');
            if ($image) {
                $img_gen = hexdec(uniqid());
                $img_ext = strtolower($image->getClientOriginalExtension());
                $img_name = $img_gen . '.' . $img_ext;
                $up_location = 'image/testimonials';
                $image->move($up_location, $img_name);
                unlink('image/testimonials/' . $old_image);


                Testimonials::find($id)->update([
                'name' => $request->name,
                'image' => $img_name,
                'designation' => $request->designation,
                'description' => $request->description,
                'created_at' => Carbon::now()
                ]);
            } else {
                Testimonials::find($id)->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'description' => $request->description,
                'created_at' => Carbon::now()
                ]);
            }



            return redirect()->back();
        }
    }





}

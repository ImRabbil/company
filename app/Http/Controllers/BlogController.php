<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function blog_View()
    {
        $blog = Blog::latest()->get();
        // return response()->json($blog);
        return view('fontend.blog.index', compact('blog'));
    }

    public function admin_blog_View()
    {
        $blog = Blog::latest()->get();

        return view('admin.blog.index', compact('blog'));
    }
    public function blog_Store(Request $request)
    {
        $image = $request->file('image');
        $img_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $img_gen . '.' . $img_ext;
        $up_location = 'image/blog';
        $image->move($up_location, $img_name);

        Blog::insert([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $img_name,
            'created_at' => Carbon::now()
        ]);


        return redirect()->route('admin_blog');
    }
    public function single_blog_View()
    {
        $blog = Blog::latest()->first();
        return view('fontend.blog.single_blog', compact('blog'));
    }
}

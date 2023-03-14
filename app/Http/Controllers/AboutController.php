<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\About;
use Illuminate\Http\Request;

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
}

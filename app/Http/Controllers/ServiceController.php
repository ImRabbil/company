<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Service;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Features;

class ServiceController extends Controller
{
    public function Service()
    {
        $service = Service::latest()->get();
        return view('admin.service.index', compact('service'));
    }
    public function Add_Service()
    {
        return view('admin.service.create');
    }
    public function Service_Store(Request $request)
    {
        Service::insert([
            'title' => $request->title,
            'description' => $request->description,
            'icon_name' => $request->icon_name,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('home.service');
    }
    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }
    public function update(Request $request,$id){
        $update = Service::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon_name' => $request->icon_name,
            
        ]);
        return redirect()->route('home.service');
       }

       public function delete($id){
        $delete = Service::find($id)->delete();
    return redirect()->back();
    }
    public function F_Service(){
        $service = Service::latest()->get();
        $features = Feature::latest()->get();
        return view('fontend.service.index',compact('service','features'));
    }
    public function Features()
    {
        $features = Feature::latest()->get();
        return view('admin.feature.index',compact('features'));
    }

    public function Feature_Store(Request $request){
        Feature::insert([
            'title' => $request->title,
            'icon_name' => $request->icon_name,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('all.features');
    }

    public function Feature_Update(Request $request ,$id){

        $update = Feature::find($id)->update([
            'title' => $request->title,
            'icon_name' => $request->icon_name,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('all.features');

    }

}

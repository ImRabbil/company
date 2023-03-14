<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\ServiceFeatures;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class ServiceFeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicesf = ServiceFeatures::all();
        return view('backend.serviceFeatures.index',compact('servicesf'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.serviceFeatures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required',
            'description'=>'required',
        ]);

        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('website/image',$imageName);
        }

        $data = [
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$imageName,
            'slug'=>Str::slug($request->name, '-')
        ];
        ServiceFeatures::create($data);
        $request->session()->flash('status', 'Service Created Succesfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceFeatures $serviceFeatures)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceFeatures  $service_feature)

    {
        return view('backend.serviceFeatures.edit',compact('service_feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceFeatures $service_feature)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        $OldImage = 'website/image/'.$service_feature->image;
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('website/image',$imageName);

        if($service_feature->image != '' || $service_feature->image != Null){
            if(file_exists($OldImage)){
                unlink($OldImage);
            }
        }

        }

        $data = [
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$imageName,
            'slug'=>Str::slug($request->name, '-')
        ];
        $service_feature->update($data);
        $request->session()->flash('status','Service Update Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceFeatures $service_feature)
    {
        $OldImage = 'website/image/'.$service_feature->image;
        if($service_feature->image != '' || $service_feature->image != Null){
            if(file_exists($OldImage)){
                unlink($OldImage);
            }
        }
        $service_feature->delete();
        return redirect()->back();
    }
}

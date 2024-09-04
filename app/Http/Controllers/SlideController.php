<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = Slide::all();
        return view('backend.slide.index',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required'
        ]);
        $imageName ='';
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('website/image',$imageName);
        }
        $data = [
            'title'=>$request->title,
            'slug'=>Str::slug($request->title, '-'),
            'image'=>$imageName,
            'description'=>$request->description,
        ];
        Slide::create($data);
        $request->session()->flash('status', 'Slide Created Succesfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        return view('backend.slide.edit',compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slide $slide)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        $oldImage = 'website/image/'.$slide->image;

        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('website/image',$imageName);

                if($slide->image != null || $slide->image != '' ){
                    if(file_exists($oldImage)){
                        unlink($oldImage);
                    }
                }
        }else{
            $imageName = $slide->image;
        }
        $data = [
            'title'=>$request->title,
            'image'=>$imageName,
            'description'=>$request->description,
        ];
        $slide->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        $oldImage = 'website/image/'.$slide->image;
        if($slide->image != null || $slide->image != '' ){
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
        }
        $slide->delete();
        return redirect()->back();
    }
}

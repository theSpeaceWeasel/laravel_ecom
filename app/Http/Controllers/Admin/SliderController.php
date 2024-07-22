<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {
        $validatedData= $request->validated();
                        
        $slider = Slider::create([
            'title'=> $validatedData['title'],
            'description'=>$validatedData['description'],

        ]);
            
        if ($request->hasFile('image')) {
                $path = $request->file('image')->store('/uploads/category');
                $slider->image= $path;
                $slider->save();
                

            }

        return redirect('admin/slider')->with('message','slider added');
    }


    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', [
            'slider'=>$slider,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $validatedData= $request->validated();
                // $validatedData= $request->all();

           
            $slider->title = $validatedData['title'];
            $slider->description=$validatedData['description'];
             if ($request->hasFile('image')) {

                $path = $request->file('image')->store('uploads/category');
                
                if(File::exists(public_path("storage/$slider->image"))){
                    File::delete(public_path("storage/$slider->image"));
                }
                $slider->image= $path;
            }
            $slider->update();
            return redirect('admin/slider')->with('message','slider updated');    
    }


}

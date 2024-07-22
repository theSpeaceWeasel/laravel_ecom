<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $validatedData= $request->validated();
                // $validatedData= $request->all();

            $brand= new Brand;
            $brand->name = $validatedData['name'];
            $brand->slug= Str::slug ($validatedData['slug']);
            $brand->status = $request->status == true? '1':'0';
            $brand->save();
            return redirect('admin/brand')->with('message','Brand added');
    }

  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', ['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $validatedData= $request->validated();
                // $validatedData= $request->all();

           
            $brand->name = $validatedData['name'];
            $brand->slug= Str::slug ($validatedData['slug']);
           
            $brand->status = $request->status == true? '1':'0';
            $brand->update();
            return redirect('admin/brand')->with('message','Brand updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}

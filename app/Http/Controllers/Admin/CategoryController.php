<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return 'hi';
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validatedData= $request->validated();
                // $validatedData= $request->all();

            $category= new Category;
            $category->name = $validatedData['name'];
            $category->slug= Str::slug ($validatedData['slug']);
            $category->description = $validatedData['description'];
            if ($request->hasFile('image')) {

                $path = $request->file('image')->store('/uploads/category');
                $category->image= $path;

            }
            
            $category->meta_title = $validatedData['meta-title']; 
            $category->meta_keyword = $validatedData['meta-keyword'];
            $category->meta_description = $validatedData['meta-description'];
            $category->status = $request->status == true? '1':'0';
            $category->save();
            return redirect('admin/category')->with('message','Category added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validatedData= $request->validated();
                // $validatedData= $request->all();

           
            $category->name = $validatedData['name'];
            $category->slug= Str::slug ($validatedData['slug']);
            $category->description = $validatedData['description'];
            if ($request->hasFile('image')) {

                $path = $request->file('image')->store('uploads/category');
                
                if(File::exists(public_path("storage/$category->image"))){
                    File::delete(public_path("storage/$category->image"));
                }
                $category->image= $path;
            }
            
            $category->meta_title = $validatedData['meta-title']; 
            $category->meta_keyword = $validatedData['meta-keyword'];
            $category->meta_description = $validatedData['meta-description'];
            $category->status = $request->status == true? '1':'0';
            $category->update();
            return redirect('admin/category')->with('message','Category updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}

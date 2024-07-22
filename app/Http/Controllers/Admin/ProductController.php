<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $categories = Category::all();
            $brands = Brand::all();
           return view('admin.product.create', [
                'categories' => $categories,
                'brands' => $brands
           ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData= $request->validated();
                // dd($validatedData);
        $category=Category::findOrFail($validatedData['category_id']);
        $product = $category->products()->create([
            'name'=> $validatedData['name'],
           'slug'=>Str::slug($validatedData['slug']),
            'sku'=>$validatedData['sku'],
            'price'=>$validatedData['price'],
            'weight'=>$validatedData['weight'],
            'title'=>$validatedData['title'],
            'quantity'=>$validatedData['quantity'],
            'small_description'=>$validatedData['small_description'],
            'description'=>$validatedData['description'],
            'trending'=> $request->trending == true? '1':'0',
            'category_id'=>$validatedData['category_id'],
            'brand_id'=>$validatedData['brand_id'],
            'meta_title'=>$validatedData['meta_title'],
            'meta_keyword'=>$validatedData['meta_keyword'],
            'meta_description'=>$validatedData['meta_description']

        ]);

            if ($request->hasFile('image')) {

                foreach($request->file('image') as $image){
                       $path = $image->store('/uploads/category');
                        $product->images()->create([
                            'product_id'=>$product->id,
                            'image'=>$path
                    ]);
                }
             

            }
            

            return redirect('admin/product')->with('message','Product added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        // dd($product->images);
        $categories=Category::all();
        $brands= Brand::all();

        return view('admin.product.edit', [
            'product'=>$product,
            'categories'=>$categories,
            'brands'=>$brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData= $request->validated();
                // dd($validatedData);
        $product->update([
            'name'=> $validatedData['name'],
           'slug'=>Str::slug($validatedData['slug']),
            'sku'=>$validatedData['sku'],
            'price'=>$validatedData['price'],
            'weight'=>$validatedData['weight'],
            'title'=>$validatedData['title'],
            'quantity'=>$validatedData['quantity'],
            'small_description'=>$validatedData['small_description'],
            'description'=>$validatedData['description'],
            'trending'=> $request->trending == true? '1':'0',
            'category_id'=>$validatedData['category_id'],
            'brand_id'=>$validatedData['brand_id'],
            'meta_title'=>$validatedData['meta_title'],
            'meta_keyword'=>$validatedData['meta_keyword'],
            'meta_description'=>$validatedData['meta_description']

        ]);

            if ($request->hasFile('image')) {

                foreach($request->file('image') as $image){
                       $path = $image->store('/uploads/category');
                        $product->images()->create([
                            'product_id'=>$product->id,
                            'image'=>$path
                    ]);
                }
             

            }
            

            return redirect('admin/product')->with('message','Product updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function destroyImage(Image $image)
    {
        if(File::exists(public_path("storage/$image->image"))){
            File::delete(public_path("storage/$image->image"));
        }

        $image->delete();
        return redirect()->back();
    }
}

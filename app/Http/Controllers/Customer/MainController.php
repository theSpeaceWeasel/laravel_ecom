<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Carbon;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::whereMonth('created_at', Carbon::now()->month)->get();
        // dd($products);
        $sliders=Slider::all();
        return view('customer.index', [
            'sliders'=>$sliders,
            'products'=>$products
        ]);
    }

    public function categories(){
        $categories = Category::all();
        return view('customer.category.index', compact('categories'));
    }


    public function singleProduct(Category $category, Product $product){
        // dd($category,$product);
        return view('customer.category.singleproduct', compact('category','product'));
    }

    
    public function products(Category $category)
    {
        // dd($category);
        $products = $category->products()->get();
        return view('customer.category.products', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function sort(Request $request,Category $category)
    {
        // dd($request->price_sort);
        $products = null;
        if($request->price_sort == "high_low"){
            $products = $category->products()->orderBy('price','DESC')->get();
        }else{
            $products = $category->products()->orderBy('price','DESC')->get();
        }
        
        return view('customer.category.products', compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

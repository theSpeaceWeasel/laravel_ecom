<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request){

        $searchTerm=$request->search;

        $products=Product::where('name', 'LIKE', "%$searchTerm%")->get(); 
        // dd($products); 

        if($products->count()){
            return view('search.index', compact('products'));  
        }else{
            return 'no products found';
        }

       
    }
}

<?php

namespace App\Http\Controllers\Customer;

use App\Models\Wishlist;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $wishlistItems = Wishlist::where('user_id', auth()->user()->id)->get(); 
        // dd($wishlistItems->first()->product);


        return view('customer.wishlist.index', compact('wishlistItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWishlistRequest $request)
    {
        Wishlist::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id
        ]);
        return redirect()->back()->with('message', 'wishlist added');
    }

   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return redirect()->back();
    }
}

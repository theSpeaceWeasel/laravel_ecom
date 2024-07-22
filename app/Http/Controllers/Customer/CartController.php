<?php

namespace App\Http\Controllers\Customer;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
  
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->user()->id)->get(); 
        // dd($wishlistItems->first()->product);


        return view('customer.cart.index', compact('cartItems'));
        
    }

    
    public function store(StoreCartRequest $request)
    {
        // return dd($request->product_id);
        $product=Product::findOrFail($request->product_id);
        // dd($product);

        if($product->quantity<$request->cart_quantity){
            return redirect()->back()->with('cart_message', "there is only $product->quantity items left");
        }

        if($cart=Cart::where('user_id', auth()->user()->id)->where('product_id', $request->product_id)){
            $cart->delete();
        }
        Cart::create([
            'product_id'=>$request->product_id,
            'user_id'=>auth()->user()->id,
            'quantity'=>$request->cart_quantity
        ]);

        if($wishlist = Wishlist::find($request->item_id)){
            $wishlist->delete();
        }

        
        return redirect()->back();
    }


    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Cart;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
 
    public function index()
    {   
        $total=0;
        $cartItems=Cart::where('user_id', auth()->user()->id)->get();
        foreach($cartItems as $item){
            $total+=$item->product->price*$item->quantity;
        }
        return view('customer.checkout.index', compact('total'));
    }

  
    public function orders()
    {
        $checkouts = Checkout::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(5);
        // dd($checkouts->first()->products);

        return view('customer.orders.index', compact('checkouts'));
    }

   

    public function showOrder(Checkout $checkout)
    {
        // dd($checkout->products()->orderBy('name','asc')->get());
        return view('customer.orders.show', compact('checkout'));
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function adminOrders(Request $request, Checkout $checkout)
    {
        $checkouts = Checkout::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(5);
        // dd($checkouts->first()->user);
        return view('admin.orders.index', compact('checkouts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function showAdminOrder(Checkout $checkout)
    {
        return 'i';
    }
}

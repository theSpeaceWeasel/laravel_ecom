<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Checkout;
use Illuminate\Support\Str;
use App\Mail\InvoiceMail;

class StripeController extends Controller
{


    public function create(){
        $stripe = new \Stripe\StripeClient('sk_test_51ODvfXEywwjhyjvetTRXYK27CEAdPaHNhPvE3hCnpMUAqO2s3VXaXoI9Lm7zTn3uLgEA6Y8rMRb3fx1qXbwIFuDp00d3PMsRoN');

        $lineItems=[];
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();
        foreach($cartItems as $item){
            $lineItems[] = [
                'price_data' => [
                  'currency' => 'usd',
                  'product_data' => [
                    'name' => $item->product->name,
                  ],
                  'unit_amount' => $item->product->price*100,
                ],
                'quantity' => $item->quantity,
              ];
        }
             $session = $stripe->checkout->sessions->create([
              'line_items' => $lineItems,
              'mode' => 'payment',
              'success_url' => route('stripe.success',[],true)."?session_key={CHECKOUT_SESSION_ID}",
              'cancel_url' => route('stripe.cancel',[],true),
            ]);

        // $session->id;

            return redirect($session->url);
    }



    public function success(Request $request){


        $session_key = $request->session_key;

        $stripe = new \Stripe\StripeClient('sk_test_51ODvfXEywwjhyjvetTRXYK27CEAdPaHNhPvE3hCnpMUAqO2s3VXaXoI9Lm7zTn3uLgEA6Y8rMRb3fx1qXbwIFuDp00d3PMsRoN');


        try {
          $session = $stripe->checkout->sessions->retrieve($session_key);
          if(!$session){
            throw new NotFoundHttpException;
          }
        } catch (Error $e) {
          throw new NotFoundHttpException;
        }

        $checkout=Checkout::create([
                        'user_id'=>auth()->user()->id,
                        'tracking_no' => $session->payment_intent,
                        'fullname' => auth()->user()->email,
                        'email' => auth()->user()->email,
                        'phone' => '',
                        'pincode'=> '',
                        'address' => '',
                        'status_message' => 'completed',
                        'payment_mode' => 'stripe',
                        'payment_id' => $session->id
                    ]);
                    
                    $cartItems = Cart::where('user_id', auth()->user()->id)->get();
                    foreach($cartItems as $item){
                        // dd($checkout,$item->product);
                        $checkout->products()->save($item->product,['quantity'=>$item->quantity,'price'=>$item->quantity*$item->product->price]);
                        $item->delete();
                    } 



                    //email invoice
                    

        return redirect()
            ->route('home')
            ->with('success', 'Transaction complete.');
    }


    public function cancel(){
        return redirect()
            ->route('checkout')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }






}

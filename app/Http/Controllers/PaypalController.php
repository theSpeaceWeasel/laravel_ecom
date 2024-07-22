<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Cart;
use Illuminate\Support\Str;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaypalController extends Controller
{

    public function create(Request $request)
    {   
        // dd($request->payment_total);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => url('paypal/success'),
                "cancel_url" => url('paypal/cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->payment_total
                    ]
                ]
            ]
        ]);


        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('checkout')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('checkout')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
        
    }

    public function success(Request $request)
    {
                $provider = new PayPalClient;
                $provider->setApiCredentials(config('paypal'));
                $provider->getAccessToken();
                $response = $provider->capturePaymentOrder($request['token']);
                // dd($response);
                if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                    //create order orderder_id: $response['id']
                    $checkout=Checkout::create([
                        'user_id'=>auth()->user()->id,
                        'tracking_no' => Str::random(9),
                        'fullname' => $response['purchase_units'][0]['shipping']['name']['full_name'],
                        'email' => auth()->user()->email,
                        'phone' => '',
                        'pincode'=> $response['purchase_units'][0]['shipping']['address']['postal_code'],
                        'address' => $response['purchase_units'][0]['shipping']['address']['address_line_1'],
                        'status_message' => 'completed',
                        'payment_mode' => 'paypal',
                        'payment_id' => $response['id']
                    ]);
                    $cartItems=Cart::where('user_id', auth()->user()->id)->get();
                    foreach($cartItems as $item){
                        // dd($checkout,$item->product);
                        $checkout->products()->save($item->product,['quantity'=>$item->quantity,'price'=>$item->quantity*$item->product->price]);
                        $item->delete();
                    }
                    //email invoice


                    
                    return redirect()
                        ->route('home')
                        ->with('success', 'Transaction complete.');
                } else {
                    return redirect()
                        ->route('checkout')
                        ->with('error', $response['message'] ?? 'Something went wrong.');
                }
    }

  
    public function cancel()
    {
        return redirect()
            ->route('checkout')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
    

   }


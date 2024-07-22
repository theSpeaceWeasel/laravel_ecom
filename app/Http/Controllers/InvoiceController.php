<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Checkout;

class InvoiceController extends Controller
{
    public function download(Request $request){
        // dd($request->checkout_id);
        $checkout=Checkout::findOrFail($request->checkout_id);
        $pdf = PDF::loadView('invoice.template', compact('checkout'));

        return $pdf->download(\Str::slug($checkout->user->name).".pdf");
    
    }
}

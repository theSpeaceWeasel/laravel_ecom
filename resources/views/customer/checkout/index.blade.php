@extends('layouts.app')

@section('content')

<div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Item Total Amount :
                            <span class="float-end">{{$total}}</span>
                        </h4>
                        <hr>
                        <small>* Items will be delivered in 3 - 5 days.</small>
                        <br/>
                        <small>* Tax and other charges are included ?</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Basic Information
                        </h4>
                        <hr>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Full Name</label>
                                    <input type="text" name="fullname" class="form-control" placeholder="Enter Full Name" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Phone Number</label>
                                    <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Pin-code (Zip-code)</label>
                                    <input type="number" name="pincode" class="form-control" placeholder="Enter Pin-code" />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Full Address</label>
                                    <textarea name="address" class="form-control" rows="2"></textarea>
                                </div>
                                <input type="hidden" name="payment_total" value="{{$total}}">
                                <div class="col-md-12 mb-3">
                                    <label>Select Payment Mode: </label>
                                       <!-- Set up a container element for the button -->
                                    <a href="/paypal/create?payment_total={{$total}}" class="btn btn-primary"><i class="fa-brands fa-paypal"></i>Pay with paypal</a>
                                    <form action="{{url('/stripe/create')}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-credit-card"></i>Pay with credit card</button>
                                    </form>
                                </div>
                                
                            </div>
                        

                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
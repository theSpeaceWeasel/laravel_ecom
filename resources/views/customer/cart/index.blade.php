@extends('layouts.app')

@section('content')
        
@if(session('cart_message'))
<p>{{session('cart_message')}}</p>
@endif              

<div class="py-3 py-md-5 bg-light">
        <div class="container">
    
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                    	@foreach($cartItems as $item)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="">
                                        <label class="product-name">
                                            <img src="{{asset('storage/'.$item->product->images->first()->image)}}" style="width: 50px; height: 50px" alt="">
                                            {{$item->product->name}}
                                        </label>
                                    </a>
                                </div>

                                <div class="col-md-2 my-auto">
                                    <label class="price">${{$item->product->price}}</label>
                                </div>

                                <div class="col-md-2 my-auto">
                                    <h5>SUBTOTAL</h5>
                                    <label class="price cart-sub-total">{{($item->product->price)*($item->product->cartItems()->where('user_id', auth()->user()->id)->get()->last()->quantity)}}</label>
                                </div>

                            <form action="{{url('/cart')}}" method="POST">
                                @csrf
                                    <div class="col-md-2 col-7 my-auto">
                                        <div class="quantity">
                                            <div class="input-group">
                                                <span class="btn btn1 qt-minus"><i class="fa fa-minus"></i></span>
                                                <input type="text" name="cart_quantity" value="{{$item->product->cartItems()->where('user_id', auth()->user()->id)->get()->last()->quantity?? '1'}}" class="input-quantity" id="input-quantity" />
                                                <span class="btn btn1 qt-plus"><i class="fa fa-plus"></i></span>
                                            </div>
                                            <div class="input-group">
                                                <input type="hidden" name="product_id" value="{{$item->product->id}}">
                                            </div>
                                            <div class="input-group">
                                                <input type="hidden" name="item_id" value="{{$item->id}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 my-auto">
                                            <button type="submit" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</button>
                            		</div>
                            </form>


                                <div class="mt-2 col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <form action="{{url('cart/delete/'.$item->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Remove
                                            </button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(session('cart_message'))
                        <div class="alert alert-warning" role="alert">
                              {{session('cart_message')}}
                        </div>
                        @endif
                        @endforeach

                        <div class="row">
                            <div class="col-md-12">
                                <h4>total</h4>
                                <p id="cart-total">0 </p>
                                <a href="{{url('/checkout')}}" class="btn btn-warning">checkout</a>
                            </div>
                        </div>
                                
                    </div>
                </div>
            </div>

        </div>
    </div>



<script defer>

     window.onload=()=>{


        const qtMinusBtns = document.querySelectorAll(".qt-minus");
        const qtPlusBtns = document.querySelectorAll(".qt-plus");

        const cartSubtotalElements = document.querySelectorAll(".cart-sub-total");
        const cartTotalElement = document.querySelector("#cart-total");
        // console.log(cartSubtotalElements)


        qtMinusBtns.forEach((btn)=>{
            btn.onclick=()=>{
                if(btn.nextElementSibling.value > 1){
                    btn.nextElementSibling.value--;
                }
            }
        });

        
         qtPlusBtns.forEach((btn)=>{
            btn.onclick=()=>{
                   
                        btn.previousElementSibling.value++;   
                       
                    
                
            }
        });

         let sum = 0;
        cartSubtotalElements.forEach((element)=>{
            sum=sum+parseInt(element.innerText);
            // console.log(parseInt(element.innerText))
        })
        console.log(sum)
        cartTotalElement.innerText=sum;


     }
                                       
</script>

@endsection


@extends('layouts.app')

@section('title')
{{$products->first()->category->meta_title}}
@endsection

@section('meta_keyword')
{{$products->first()->category->meta_keyword}}
@endsection

@section('meta_description')
{{$products->first()->category->meta_description}}
@endsection

@section('content')


  


<div class="py-3 py-md-5 bg-light">
        <div class="container">


            <div class="row">

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Price filtering</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/categories/'.$products->first()->category->slug)}}" method="POST" id="form">
                                @csrf
                                <label class="d-block">
                                <input type="radio" name="price_sort" class="price_sort" value="high_low">High to low.
                                </label>
                                <label class="d-block">
                                    <input type="radio" name="price_sort" class="price_sort" value="low_high">Low to high.
                                </label>
                            </form>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-9">

                    <div class="row">
                    <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                    </div>





                        @foreach($products as $product)
                        <div class="col-md-3">
                            <div class="product-card">
                                <div class="product-card-img">
                                    @if($product->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                    @else
                                    <label class="stock bg-success">out of Stock</label>
                                    @endif
                                    <a href="{{url('/categories/'.$product->category->slug.'/'.$product->slug)}}" class="btn btn1">
                                     <img src="{{asset('/storage/'.$product->images()->get()->first()->image)}}" alt="Laptop"> 
                                    </a>
                                    
                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{$product->brand}}</p>
                                    <h5 class="product-name">
                                       <a href="{{url('/categories/'.$product->category->slug.'/'.$product->slug)}}">
                                            {{$product->name}}
                                       </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">${{$product->price}}</span>
                                    </div>
                                    <div class="mt-2">
                                           @auth
                                    @if(\App\Models\Wishlist::where('user_id',auth()->user()->id)->where('product_id',$product->id)->doesntExist())
                                    <form action="{{url('wishlist')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <button type="submit" class="btn btn1"> <i class="fa fa-heart"></i>  </button>
                                    </form>
                                    @endif
                                    @endauth
                                       
                                        <a href="{{url('/categories/'.$product->category->slug.'/'.$product->slug)}}" class="btn btn1"> View </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
                
            </div>

            


        </div>
    </div>

@endsection

                                <script defer>

                                    window.onload = () =>{
                                         function handle(event) {
                                            // console.log(event.target.value)
                                            document.querySelector("#form").submit();
                                        }
                                          const radioButtons = document.querySelectorAll("input[type='radio']");
                                        // console.log(radioButtons)
                                        radioButtons.forEach((radioButton)=>{
                                              radioButton.addEventListener('click', (e) => {
                                                if (radioButton.checked) {
                                                    handle(e);
                                                }
                                            });
                                        })
                                    }
                                    
                                </script>
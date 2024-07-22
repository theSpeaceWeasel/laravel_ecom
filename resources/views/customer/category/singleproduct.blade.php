@extends('layouts.app')

@section('title')
{{$product->meta_title}}
@endsection

@section('meta_keyword')
{{$product->meta_keyword}}
@endsection

@section('meta_description')
{{$product->meta_description}}
@endsection

@section('content')


<body>

    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        <img src="{{asset('/storage/'.$product->images()->get()->first()->image)}}" class="w-100" alt="Img">
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                           {{$product->name}}
                            <label class="label-stock bg-success">In Stock</label>
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{$category->name}} / {{$product->name}} 
                        </p>
                        <div>
                            <span class="selling-price">${{$product->price}}</span>
                            
                        </div>

                        <div>
                            @if($product->quantity)
                                <label class="btn btn-success mt-2" role="button">in stock</label>
                            @else
                                <label class="btn btn-danger mt-2" role="button">out of stock</label>
                            @endif
                            
                        </div>

                      
                        <div class="mt-2">
                       
                            @auth
                            @if(\App\Models\Wishlist::where('user_id',auth()->user()->id)->where('product_id',$product->id)->doesntExist())
                            <form action="{{url('wishlist')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <button type="submit" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </button>

                            </form>
                            @endif
                            @endauth
                            
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{$product->small_description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{$product->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
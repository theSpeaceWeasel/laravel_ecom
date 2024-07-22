@extends('layouts.app')

@section('content')





<div class="carousel-inner ">
    @foreach($sliders as $key => $slider)
    <div class="carousel-item  {{$key=='0'? 'active' : ''}}" style="height: 500px;">
      @if($slider->image)
      <img src="{{asset('storage/'.$slider->image)}}" class="d-block w-100"  style="object-fit: cover;"    alt="...">
      @endif
   

                <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                            {{$slider->title}}
                        </h1>
                        <p>
                            {{$slider->description}}
                        </p>
                        <div>
                            <a href="#" class="btn btn-slider">
                                Get Now
                            </a>
                        </div>
                    </div>
                </div>
    </div>
    @endforeach
 </div> 


  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>




<section>
    <section class="section-products">
        <div class="container">
                <div class="row justify-content-center text-center">
                        <div class="col-md-8 col-lg-6">
                                <div class="header">
                                        <h3>Featured Product</h3>
                                        <h2>Recently added Products</h2>
                                </div>
                        </div>
                </div>
                <div class="row">
                        <!-- Single Product -->
                        @foreach($products as $product)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                                <div id="product-1" class="single-product">
                                        <div class="part-1">
                                            <img src="{{asset('/storage/'.$product->images()->get()->first()->image)}}">
                                                <ul>
                                                        <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                                       
                                                        <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                                </ul>
                                        </div>
                                        <div class="part-2">
                                                <h3 class="product-title">{{$product->name}}</h3>
                                                <h4 class="product-price">${{$product->price}}</h4>
                                                
                                        </div>
                                </div>
                        </div>
                        @endforeach
                    
                </div>
        </div>
</section>
</section>


@endsection
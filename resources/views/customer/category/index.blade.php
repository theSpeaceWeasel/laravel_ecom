@extends('layouts.app')

@section('content')

<div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Categories</h4>
                </div>

          
                
             @foreach($categories as $category)
             	<div class="col-6 col-md-3">
                    <div class="category-card">
                        <a href="{{url('/categories/'.$category->slug)}}">
                            <div class="category-card-img">
                                <img src="{{asset('/storage/'.$category->image)}}" class="w-100" alt="Women Fashion">
                            </div>
                            <div class="category-card-body">
                                <h5>{{$category->name}}</h5>
                            </div>
                        </a>
                    </div>
                </div>
             @endforeach


            </div>
        </div>
    </div>

@endsection
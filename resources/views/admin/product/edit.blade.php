@extends('layouts.admin')

@section('content')
 
<div class="row">
            <div class="col-md-12 grid-margin">

                <div class="card">
                    <div class="card-header">
                        <h3>Edit Product</h1>
                        <a href="{{url('admin/product')}}" class="btn btn-primary float-end btn-sm">Back</a>
                    </div>
                    <div class="card-body">
                        ﻿
                            @foreach($errors->all() as $error) 
                            <li>{{$error}}</li>
                            @endforeach       

                                                
                        <form action="{{url('admin/product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name}}" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Slug</label>
                                    <input type="text" name="slug" class="form-control" value="{{ $product->slug}}"/> 
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>SKU</label>
                                    <input type="text" name="sku" class="form-control" value="{{ $product->sku}}"/> 
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control" value="{{ $product->price}}"/> 
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>weight</label>
                                    <input type="text" name="weight" class="form-control" 
                                    value="{{ $product->weight}}"/> 
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>title</label>
                                    <input type="text" name="title" class="form-control" 
                                    value="{{ $product->title}}"/> 
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>trending</label>
                                    <input type="checkbox" name="trending" class="form-control" /> 
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>quantity</label>
                                    <input type="text" name="quantity" class="form-control" 
                                    value="{{ $product->quantity}}"/> 
                                </div>

                                <div class="col-md-12-mb-3">
                                    <label>small description</label>
                                    <textarea name="small_description" class="form-control" rows="3" value="{{ $product->small_description}}"></textarea>
                                </div>

                                <div class="col-md-12-mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="3" value="{{ $product->description}}"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image[]" multiple class="form-control" />
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label>category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select> 
                                </div>

                                  <div class="col-md-6 mb-3">
                                    <label>brand</label>
                                    <select name="brand_id" class="form-control">
                                        @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select> 
                                </div>

                                  <div class="col-md-12 mb-3">
                                    <h4>SEO tags</h4>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" 
                                    value="{{ $product->meta_title}}"/> 
                                </div>

                                <div class="col-md-12-mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="3"
                                   value="{{ $product->meta_keyword}}" ></textarea>
                                </div>

                                <div class="col-md-12-mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3" value="{{ $product->meta_description}}"></textarea>
                                </div>

                                <div>

                                    @if($product->images)
                                    <div class="row">
                                        @foreach($product->images as $image)
                                            <div class="col-md-2">
                                                <img width="80px" height="75px" src="{{asset('storage/'.$image->image)}}">
                                                <a href="{{ url('admin/image/'.$image->id.'/delete') }}">Remove</a>
                                            </div>
                                           
                                        @endforeach
                                    </div>    
                                    @else
                                        <h4>no images</h4>
                                    @endif

                                
                                </div>

                                <div class="col-md-12-mb-3">
                                    <button class="btn btn-primary float-end btn-sm" type="submit">Save</button>
                                </div>


                            </div>

                        </form>


                </div>



            </div>


</div>
          
@endsection
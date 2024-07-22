@extends('layouts.admin')

@section('content')
 <div class="row">
            <div class="col-md-12 grid-margin">

                <div class="card">
                    <div class="card-header">
                        <h3>Add Product</h1>
                        <a href="{{url('admin/product')}}" class="btn btn-primary float-end btn-sm">Back</a>
                    </div>
                    <div class="card-body">
                        ﻿
                            @foreach($errors->all() as $error) 
                            <li>{{$error}}</li>
                            @endforeach       

                                                
                        <form action="{{url('admin/product')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name')}}" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Slug</label>
                                    <input type="text" name="slug" class="form-control" value="{{ old('slug')}}"/> 
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>SKU</label>
                                    <input type="text" name="sku" class="form-control" value="{{ old('sku')}}"/> 
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control" value="{{ old('price')}}"/> 
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>weight</label>
                                    <input type="text" name="weight" class="form-control" 
                                    value="{{ old('weight')}}"/> 
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>title</label>
                                    <input type="text" name="title" class="form-control" 
                                    value="{{ old('titles')}}"/> 
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>trending</label>
                                    <input type="checkbox" name="trending" class="form-control" /> 
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>quantity</label>
                                    <input type="text" name="quantity" class="form-control" 
                                    value="{{ old('quantity')}}"/> 
                                </div>

                                <div class="col-md-12-mb-3">
                                    <label>small description</label>
                                    <textarea name="small_description" class="form-control" rows="3" value="{{ old('small_description')}}"></textarea>
                                </div>

                                <div class="col-md-12-mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="3" value="{{ old('description')}}"></textarea>
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
                                    value="{{ old('meta_title')}}"/> 
                                </div>

                                <div class="col-md-12-mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="3"
                                   value="{{ old('meta_keyword')}}" ></textarea>
                                </div>

                                <div class="col-md-12-mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3" value="{{ old('meta_description')}}"></textarea>
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
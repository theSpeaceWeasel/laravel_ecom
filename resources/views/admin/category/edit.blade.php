@extends('layouts.admin')

@section('content')
 
<div class="row">
            <div class="col-md-12 grid-margin">

                <div class="card">
                    <div class="card-header">
                        <h3>Edit Category</h1>
                        <a href="{{url('admin/category')}}" class="btn btn-primary float-end btn-sm">Back</a>
                    </div>
                    <div class="card-body">
                        ﻿
                            @foreach($errors->all() as $error) 
                            <li>{{$error}}</li>
                            @endforeach       

                                                
                        <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" value="{{$category->name}}" name="name" class="form-control" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Slug</label>
                                    <input type="text" value="{{$category->slug}}" name="slug" class="form-control" /> 
                                </div>

                                <div class="col-md-12-mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="3">
                                        {{$category->description}}
                                    </textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" />
                                    <img src="{{asset('storage/'.$category->image)}}" width="60px" height="75px">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Status</label><br/>
                                    <input type="checkbox" name="status" {{ $category->status == '1'? "checked" : "" }} />
                                </div>

                                  <div class="col-md-12 mb-3">
                                    <h4>SEO tags</h4>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" value="{{$category->meta_title}}" name="meta-title" class="form-control" /> 
                                </div>

                                <div class="col-md-12-mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta-keyword" class="form-control" rows="3">
                                        {{$category->meta_keyword}}
                                    </textarea>
                                </div>

                                <div class="col-md-12-mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="meta-description" class="form-control" rows="3">
                                        {{$category->meta_description}}
                                    </textarea>
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
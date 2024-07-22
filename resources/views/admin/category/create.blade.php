@extends('layouts.admin')

@section('content')
 <div class="row">
            <div class="col-md-12 grid-margin">

                <div class="card">
                    <div class="card-header">
                        <h3>Add Category</h1>
                        <a href="{{url('admin/category')}}" class="btn btn-primary float-end btn-sm">Back</a>
                    </div>
                    <div class="card-body">
                        ﻿
                            @foreach($errors->all() as $error) 
                            <li>{{$error}}</li>
                            @endforeach       

                                                
                        <form action="{{url('admin/category')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Slug</label>
                                    <input type="text" name="slug" class="form-control" /> 
                                </div>

                                <div class="col-md-12-mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Status</label><br/>
                                    <input type="checkbox" name="status"  />
                                </div>

                                  <div class="col-md-12 mb-3">
                                    <h4>SEO tags</h4>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta-title" class="form-control" /> 
                                </div>

                                <div class="col-md-12-mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta-keyword" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="col-md-12-mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="meta-description" class="form-control" rows="3"></textarea>
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
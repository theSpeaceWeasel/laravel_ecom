@extends('layouts.admin')

@section('content')
 <div class="row">
            <div class="col-md-12 grid-margin">

                <div class="card">
                    <div class="card-header">
                        <h3>Add Slider</h1>
                        <a href="{{url('admin/slider')}}" class="btn btn-primary float-end btn-sm">Back</a>
                    </div>
                    <div class="card-body">
                        ﻿
                            @foreach($errors->all() as $error) 
                            <li>{{$error}}</li>
                            @endforeach       

                                                
                        <form action="{{url('admin/slider')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label>Ttile</label>
                                    <input type="text" name="title" class="form-control" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control" /> 
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" />
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
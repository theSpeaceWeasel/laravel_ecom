@extends('layouts.admin')

@section('content')

<div class="d-flex p-2">

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Total products</h5>
    <h2 class="card-text">{{$productsTotal}}</h2>
    <a href="{{url('admin/product')}}" class="btn btn-primary">View orders</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Total orders</h5>
    <h2 class="card-text">{{$ordersTotal}}</h2>
    <a href="{{url('admin/orders')}}" class="btn btn-primary">View orders</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Today orders</h5>
    <h2 class="card-text">{{$todayOrders}}</h2>
    <a href="{{url('admin/orders')}}" class="btn btn-primary">View orders</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Total categories </h5>
    <h2 class="card-text">{{$categoriesTotal}}</h2>
    <a href="{{url('admin/category')}}" class="btn btn-primary">View orders</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Total brands </h5>
    <h2 class="card-text">{{$brandsTotal}}</h2>
    <a href="{{url('admin/brand')}}" class="btn btn-primary">View orders</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Total users </h5>
    <h2 class="card-text">{{$usersTotal}}</h2>
  </div>
</div>
</div>


          
@endsection
@extends('layouts.app')

@section('content')



<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<thead>
			<th>tracking no</th>
			<th>name</th>
			<th>payment modo</th>
			<th>ordered date</th>
		</thead>
		<tbody>
			@foreach($checkouts as $checkout)
			<tr>
				<td>{{ $checkout->tracking_no }}</td>
				<td>{{ $checkout->user->name }}</td>
				<td>{{ $checkout->payment_mode }}</td>
				<td>{{ $checkout->created_at }}</td>
				<td><a href="{{url('/orders/'.$checkout->id)}}" class="btn btn-primary">View order</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{$checkouts->links()}}
</div>
























@endsection
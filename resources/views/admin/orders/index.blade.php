@extends('layouts.admin')

@section('content')







<div class="table-responsive">

	<table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>tracking no</th>
									<th>name</th>
									<th>payment modo</th>
									<th>ordered date</th>
									<th>action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($checkouts as $checkout)
                            <tr>
								<td>{{ $checkout->tracking_no }}</td>
								<td>{{ $checkout->user->name }}</td>
								<td>{{ $checkout->payment_mode }}</td>
								<td>{{ $checkout->created_at }}</td>
								<td>
									<a href="{{url('admin/orders/'.$checkout->id)}}" class="m-1 text-light btn btn-primary">View order
									</a>
									<form action="{{url('/invoice/download')}}" method="POST">
										@csrf
										<input type="hidden" value="{{$checkout->id}}" name="checkout_id">
										<button type="submit" class=" m-1 text-light btn btn-primary">download invoice</button>
									</form>
								</td>
								
							</tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                     <th>tracking no</th>
									<th>name</th>
									<th>payment modo</th>
									<th>ordered date</th>
									<th>action</th>
                                </tr>
                            </tfoot>
                        </table>



	
</div>





@endsection
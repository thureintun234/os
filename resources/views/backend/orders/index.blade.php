@extends('backendtamplate')

@section('content')
<div class="container-fluid">
	<h2 class="d-inline-block">Order List (Table)</h2>
	<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Voucherno</th>
					<th>Orderdate</th>
					<th>Note</th>
					<th>Total</th>
					<th>User Name</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1;  @endphp
				@foreach($orders as $order)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$order->voucherno}}</td>
					<td>{{$order->orderdate}}</td>
					<td>{{$order->note}}</td>
					<td>{{$order->total}}</td>
					<td>{{$order->user->name}}</td>
					<td>
						<a href="{{route('orders.show',$order->id,$order->voucherno)}}" class="btn btn-primary">Detail</a>
						<a href="#" class="btn btn-info">Confirm</a>
					</td>
				</tr>
				@endforeach
			</tbody>
	</table>
</div>

@endsection
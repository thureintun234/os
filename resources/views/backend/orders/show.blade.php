@extends('backendtamplate')

@section('content')
{{-- @php $voucherno = $_GET['voucherno']; @endphp --}}
	<div class="container table-responsive">
		<div class="row border border-dark">
			<div class="col-md-12 text-center">
				<h3>Online Shopping</h3>
				<p>Shopping Store</p>
				<p>Fashion Store Center,Mandalay</p>
				<p>Tel: 09797474923</p>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<p>Casher</p>
					</div>
					<div class="col-md-6">
						<p>: John Wick</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<p>Date</p>
					</div>
					<div class="col-md-6">
						{{date('Y-m-d')}}
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<p>Voucher</p>
					</div>
					<div class="col-md-6">
						<p>{{$order->voucherno}}</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<p>Order Time</p>
					</div>
					<div class="col-md-6">
						{{date('H:i:s')}}
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<table width="100%" border="border-dark" cellpadding="7">
				<thead>
					<tr>
						<th>Order Name</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
					@php $total=0;  @endphp
					@foreach($order->items as $item)
					@php $price = $item->price; @endphp
					@php $discount = $item->discount; @endphp
					@if($discount)
					@php $unit_price = $discount;  @endphp
					@else
					@php $unit_price=$price;   @endphp
					@endif
				
						<tr>
							<td>{{$item->name}}</td>
							<td>{{$unit_price}}</td>
							<td>{{$item->getRelationValue('pivot')->qty}}</td>
							<td>{{$amount=$unit_price*$item->getRelationValue('pivot')->qty}}</td>
						</tr>
						@php $total+=$amount;	@endphp
					@endforeach

				</tbody>
				<tfoot>
					<tr>
						<td colspan="3">Total Amount</td>
						<td>
							{{$total}}
						</td>
					</tr>
				</tfoot>

			</table>
		</div>
	</div>
@endsection
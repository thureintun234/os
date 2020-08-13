@extends('backendtamplate')

@section('content')
	<div class="container-fluid">
		<h2 class="d-inline-block">Item Detail (Your UI)</h2>
		<a href="{{route('items.index')}}" class="btn btn-success float-right">Back Item</a>
		<div class="row my-3">
			<div class="col-md-4">
				<img src="{{asset($item->photo)}}" width="300" height="300">	
			</div>
			<div class="col-md-8">
				<table class="table">
						<tr>
							<td>Product Name</td>
							<td>{{$item->name}}</td>
						</tr>
						<tr>
							<td>Product Codeno</td>
							<td>{{$item->codeno}}</td>
						</tr>
						<tr>
							<td>Product Price</td>
							<td>{{$item->price}}</td>
						</tr>
						<tr>
							<td>Product Discount</td>
							<td>{{$item->discount}}</td>
						</tr>
						<tr>
							<td>Product Description</td>
							<td>{{$item->description}}</td>
						</tr>
				</table>
			</div>
		</div>
	</div>
@endsection
@extends('frontendtemplate')

@section('content')
	<div class="col-lg-9">
		<h2 class="text-center py-5 text-muted">Item Page Filter By brand and subcategory</h2>
		<div class="row">
		@foreach($items as $item)
		<div class="col-lg-4 col-md-6 mb-4">
			<div class="card h-100">
				<a href="#"><img class="card-img-top" src="{{asset($item->photo)}}" alt=""></a>
				<div class="card-body">
					<h4 class="card-title">
						<a href="#">{{$item->name}}</a>
					</h4>
					<h5>${{$item->price}}</h5>
					<p class="card-text">{{$item->description}}</p>
				</div>
				<div class="card-footer">
					<a href="" class="btn btn-info btn-sm">Add To Cart</a>
					<a href="{{route('detail',$item->id)}}" class="btn btn-primary btn-sm">Detail</a>
				</div>
			</div>
		</div>
		@endforeach


	</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript" src="{{asset('frontend/js/script.js')}}"></script>
@endsection
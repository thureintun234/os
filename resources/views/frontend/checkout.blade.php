@extends('frontendtemplate')

@section('content')
<div class="col-lg-9 border border-secondary my-3">
	<h2 class="text-center text-muted my-3">Checkout Page</h2>
	<div class="container table-responsive my-5">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Photo</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Sub Total</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
		<div class="row">
			<div class="offset-md-2 col-md-8">
				<div class="form-group">
					<textarea class="form-control notes" placeholder="Notes"></textarea>
					<input type="hidden" name="" class="total">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="offset-md-2 col-md-4">
				<a href="{{route('homepage')}}" class="btn btn-success">Continue Shopping</a>
			</div>
			<div class="offset-md-2 col-md-4">
				@auth
				<button class="btn btn-info buy_now ">Check Out</button>
				@else
				<a href="{{route('login')}}" class="btn btn-info">Login To Checkout</a>
				@endauth
			</div>
		</div>
	</div>

</div>
@endsection
@section('script')
	<script type="text/javascript" src="{{asset('frontend/js/script.js')}}"></script>
@endsection
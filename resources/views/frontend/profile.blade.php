@extends('frontendtemplate')

@section('content')
	<div class="col-lg-9 border border-secondary my-3" style="background-color: silver;">
		<h2 class="text-center text-muted my-3">Customer Profile Page</h2>
		<div class="row my-3">
		<div class="offset-md-2 col-md-8">

			<form enctype="multipart/form-data" method="" action="{{route('login')}}">
				@csrf
				{{-- <div class="form-group">
					<input type="file" class="form-control-file {{ $errors->has('user_profile') ? 'border border-danger' : '' }}" placeholder="Profile" name="user_profile">
					<span style="color:red;">{{$errors->first('user_profile')}}</span>
					<img src="{{asset('ethicalhacker.jpeg')}}" width="200" height="150">
				</div> --}}

				<div class="form-group">
					<input type="text" class="form-control form-control-user"placeholder="Name" name="user_name" value="{{Auth::user()->name}}">
				</div>

				<div class="form-group">
					<input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="user_email" value="{{Auth::user()->email}}">
				</div>

				{{-- <div class="form-group">
					<input type="password" class="form-control form-control-user"placeholder="Password" name="user_password" value="">
				</div>

				<div class="form-group">
					<input type="password" class="form-control form-control-user"placeholder="Confirm Password" name="user_cpassword" value="">
				</div> --}}

				{{-- <div class="form-group">
					<input type="number" class="form-control form-control-user"placeholder="Phone Number" name="user_phone" value="{{Auth::user()->phoneno}}">
				</div>

				<div class="form-group">
					<textarea class="form-control" placeholder="Address" name="user_address">{{Auth::user()->address}}</textarea>
				</div> --}}                
				<input type="submit" class="btn btn-primary btn-user btn-block" value="Updated">
			</form>
		</div>
	</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript" src="{{asset('frontend/js/script.js')}}"></script>
@endsection
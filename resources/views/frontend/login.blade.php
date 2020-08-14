@extends('frontendtemplate')

@section('content')
	<div class="col-lg-9 border border-secondary my-3" style="background-color: silver;">
		<h2 class="text-center text-muted my-3">Login Page</h2>
		<div class="row my-3">
		<div class="offset-md-2 col-md-8">
			<form enctype="multipart/form-data" method="" action="{{route('dashboard')}}">
				@csrf
			
				<div class="form-group">
					<input type="email" class="form-control form-control-user {{ $errors->has('user_email') ? 'border border-danger' : '' }}" id="exampleInputEmail" placeholder="Email Address" name="user_email">
					<span style="color:red;">{{$errors->first('user_email')}}</span>
				</div>

				<div class="form-group">
					<input type="password" class="form-control form-control-user {{ $errors->has('user_password') ? 'border border-danger' : '' }}"placeholder="Password" name="user_password">
					<span style="color:red;">{{$errors->first('user_password')}}</span>
				</div>
       
				<input type="submit" class="btn btn-primary btn-user btn-block" value="Register Account">
			</form>
			<hr>
			<div class="text-center">
				<a class="small" href="#">Forgot Password?</a>
			</div>
		</div>
	</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript" src="{{asset('frontend/js/script.js')}}"></script>
@endsection
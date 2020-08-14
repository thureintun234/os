@extends('frontendtemplate')

@section('content')
<div class="col-lg-9 border border-secondary my-3" style="background-color: silver;">
	<h2 class="text-center text-muted my-3">Register Account</h2>
	<div class="row my-3">
		<div class="offset-md-2 col-md-8">
			<form enctype="multipart/form-data" method="" action="{{route('login')}}">
				@csrf
				<div class="form-group">
					<input type="file" class="form-control-file {{ $errors->has('user_profile') ? 'border border-danger' : '' }}" placeholder="Profile" name="user_profile">
					<span style="color:red;">{{$errors->first('user_profile')}}</span>
				</div>

				<div class="form-group">
					<input type="text" class="form-control form-control-user {{ $errors->has('user_name') ? 'border border-danger' : '' }}"placeholder="Name" name="user_name">
					<span style="color:red;">{{$errors->first('user_name')}}</span>
				</div>

				<div class="form-group">
					<input type="email" class="form-control form-control-user {{ $errors->has('user_email') ? 'border border-danger' : '' }}" id="exampleInputEmail" placeholder="Email Address" name="user_email">
					<span style="color:red;">{{$errors->first('user_email')}}</span>
				</div>

				<div class="form-group">
					<input type="password" class="form-control form-control-user {{ $errors->has('user_password') ? 'border border-danger' : '' }}"placeholder="Password" name="user_password">
					<span style="color:red;">{{$errors->first('user_password')}}</span>
				</div>

				<div class="form-group">
					<input type="password" class="form-control form-control-user {{ $errors->has('user_cpassword') ? 'border border-danger' : '' }}"placeholder="Confirm Password" name="user_cpassword">
					<span style="color:red;">{{$errors->first('user_cpassword')}}</span>
				</div>

				<div class="form-group">
					<input type="number" class="form-control form-control-user {{ $errors->has('user_phone') ? 'border border-danger' : '' }}"placeholder="Phone Number" name="user_phone">
					<span style="color:red;">{{$errors->first('user_phone')}}</span>
				</div>

				<div class="form-group">
					<textarea class="form-control {{ $errors->has('user_address') ? 'border border-danger' : '' }}" placeholder="Address" name="user_address"></textarea>
					<span style="color:red;">{{$errors->first('user_address')}}</span>
				</div>                
				<input type="submit" class="btn btn-primary btn-user btn-block" value="Register Account">
			</form>
			<hr>
			<div class="text-center">
				<a class="small" href="#">Forgot Password?</a>
			</div>
			<div class="text-center">
				<a class="small" href="#">Already have an account? Login!</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
	<script type="text/javascript" src="{{asset('frontend/js/script.js')}}"></script>
@endsection
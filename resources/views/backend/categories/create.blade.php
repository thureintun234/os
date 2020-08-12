@extends('backendtamplate')

@section('content')
	<div class="container-fluid">
		<h2>Category Create (Form)</h2>
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<form class="row py-3" enctype="multipart/form-data" method="POST" action="{{route('categories.store')}}">
			@csrf
			<div class="offset-md-2 col-md-8">
				<div class="form-group">
					<input type="text" name="cname" placeholder="Name" class="form-control">
				</div>
				<div class="form-group">
					<input type="file" name="cphoto" placeholder="Photo" class="form-control-file">
				</div>
				<button type="submit" class="btn btn-primary">Create</button>
			</div>
		</form>
	</div>
@endsection
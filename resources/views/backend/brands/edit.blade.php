@extends('backendtamplate')

@section('content')
	<div class="container-fluid">
		<h2>Item Edit (Form / old value)</h2>
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<form class="row py-3" enctype="multipart/form-data" method="POST" action="{{route('brands.update',$brand->id)}}">
			@csrf
			@method('PUT')
			<div class="offset-md-2 col-md-8">
				<div class="form-group">
					<input type="text" name="bname" placeholder="Name" class="form-control" value="{{$brand->name}}">
				</div>
				<div class="form-group">
					<input type="file" name="bphoto" placeholder="Photo" class="form-control-file pb-2" value="{{$brand->photo}}">
					<img src="{{asset($brand->photo)}}" width="60" height="60">
					<input type="hidden" name="oldphoto" value="{{$brand->photo}}">
				</div>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
	</div>
@endsection
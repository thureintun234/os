@extends('backendtamplate')

@section('content')
	<div class="container-fluid">
		<h2>Category Create (Form)</h2>
		<form class="row py-3" enctype="multipart/form-data" method="POST" action="{{route('categories.store')}}">
			@csrf
			<div class="offset-md-2 col-md-8">
				<div class="form-group">
					<input type="text" name="cname" placeholder="Name" class="form-control {{ $errors->has('cname') ? 'border border-danger' : '' }}">
					<span style="color:red;">{{$errors->first('cname')}}</span>
				</div>
				<div class="form-group">
					<input type="file" name="cphoto" placeholder="Photo" class="form-control-file {{ $errors->has('cphoto') ? 'border border-danger' : '' }}">
					<span style="color:red;">{{$errors->first('cphoto')}}</span>
				</div>
				<button type="submit" class="btn btn-primary">Create</button>
			</div>
		</form>
	</div>
@endsection
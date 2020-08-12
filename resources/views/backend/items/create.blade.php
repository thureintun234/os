@extends('backendtamplate')

@section('content')
	<div class="container-fluid">
		<h2>Item Create (Form)</h2>
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<form class="row py-3" enctype="multipart/form-data" method="POST" action="{{route('items.store')}}">
			@csrf
			<div class="offset-md-2 col-md-8">
				<div class="form-group">
					<input type="text" name="codeno" placeholder="codeno" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="name" placeholder="Name" class="form-control">
				</div>
				<div class="form-group">
					<input type="file" name="photo" placeholder="Photo" class="form-control-file">
				</div>
				<div class="form-group">
					<input type="number" name="price" placeholder="Price" class="form-control">
				</div>
				<div class="form-group">
					<input type="number" name="discount" placeholder="Discount" class="form-control">
				</div>
				<div class="form-group">
					<textarea class="form-control" placeholder="message" name="description"></textarea>
				</div>
				<div class="form-group">
					<select class="form-control" name="brand">
						<optgroup label="Choose Brand">
							@foreach($brands as $brand)
							<option value="{{$brand->id}}">{{$brand->name}}</option>
							@endforeach
						</optgroup>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="subcategory">
						<optgroup label="Choose Subcategory">
							@foreach($subcategories as $subcategory)
							<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
							@endforeach
						</optgroup>
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Create</button>
			</div>
		</form>
	</div>
@endsection
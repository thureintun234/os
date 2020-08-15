@extends('backendtamplate')

@section('content')
	<div class="container-fluid">
		<h2>Subcategory Edit (Form / old value)</h2>
		<form class="row py-3" enctype="multipart/form-data" method="POST" action="{{route('subcategories.update',$subcategories->id)}}">
			@csrf
			@method('PUT')
			<div class="offset-md-2 col-md-8">
				<div class="form-group">
					<input type="text" name="sname" placeholder="Name" class="form-control {{ $errors->has('sname') ? 'border border-danger' : '' }}" value="{{$subcategories->name}}">
					<span style="color:red;">{{$errors->first('sname')}}</span>
				</div>
				<div class="form-group">
					<select class="form-control" name="scatid">
						<optgroup label="Choose Brand">
							@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</optgroup>
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
	</div>
@endsection
@extends('backendtamplate')

@section('content')
	<div class="container-fluid">
		<h2 class="d-inline-block">Subcategory List (Table)</h2>
		<a href="{{route('subcategories.create')}}" class="btn btn-success float-right">Add Subcategory</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Category_id</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1;	@endphp
				@foreach($subcategories as $subcategory)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$subcategory->name}}</td>
					<td>{{$subcategory->category->name}}</td>
					<td>
						<a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-warning">Edit</a>
						<form method="POST" action="{{route('subcategories.destroy',$subcategory->id)}}" onsubmit="return confirm('Are you Sure?')" class="d-inline-block">
							@csrf
							@method('DELETE')
							<input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
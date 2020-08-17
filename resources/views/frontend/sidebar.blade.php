 <div class="col-lg-3">

        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
        	@foreach($subcategories as $subcategory)
          <a href="#" class="list-group-item filter" data-id="{{$subcategory->id}}" data-name="{{$subcategory->name}}">{{$subcategory->name}}</a>
          	@endforeach
        </div>

      </div>
      <!-- /.col-lg-3 -->
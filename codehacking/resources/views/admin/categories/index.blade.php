@extends ('layouts.admin')

@section ('content')

@if (Session::has('deleted_category') )
  <div class="alert alert-success">
    {{ Session::get('deleted_category') }}
  </div>
@endif

<h1>Categories</h1>

<table class="table">
    <thead>
      <tr>
      	<th>Id</th>
      	<td>Name</td>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
      @if (count($categories))
      	@foreach($categories as $category)
	      <tr>
	      	<td>{{ $category->id }}</td>
          <td><a href="{{ route('admin.categories.edit', $category->id)}}">{{ $category->name }}</a></td>
	        <td>{{ $category->created_at->diffForHumans() }}</td>
	        <td>{{ $category->updated_at->diffForHumans() }}</td>
	      </tr>
      	@endforeach
      @endif
	</tbody>
</table>

@endsection
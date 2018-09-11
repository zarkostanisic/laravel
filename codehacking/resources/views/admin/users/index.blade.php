@extends ('layouts.admin')

@section ('content')

@if (Session::has('deleted_user') )
  <div class="alert alert-success">
    {{ Session::get('deleted_user') }}
  </div>
@endif

<h1>Users</h1>

<table class="table">
    <thead>
      <tr>
      	<th>Id</th>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
      @if (count($users))
      	@foreach($users as $user)
	      <tr>
	      	<td>{{ $user->id }}</td>
          <td><img src="{{ $user->image ? $user->image->image : 'http://placehold.it/400x400' }}" height="40"></td>
	        <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a></td>
	        <td>{{ $user->email }}</td>
	        <td>{{ $user->role->name }}</td>
	        <td>{{ $user->is_active == '1' ? 'Active' : 'Not Active' }}</td>
	        <td>{{ $user->created_at->diffForHumans() }}</td>
	        <td>{{ $user->updated_at->diffForHumans() }}</td>
	      </tr>
      	@endforeach
      @endif
	</tbody>
</table>

@endsection
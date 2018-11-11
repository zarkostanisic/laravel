@extends ('layouts.app')

@section ('content')
	
	<div class="card">

		<div class="card-body">

			<h2 class="card-title">
				Users
			</h2>
			
			<ul class="list-inline pb-1">
				<li class="list-inline-item">
					<a href="{{ route('users.create') }}">
						Create new user
					</a>
				</li>
			</ul>

			<div class="table-responsive">
				@if (count($users) > 0)
					<table class="table">
						<tr>
							<th>Id</th>
							<th>Avatar</th>
							<th>Email</th>
							<th>Permisions</th>
							<th></th>
							<th></th>
						</tr>
						@foreach ($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td><img src="{{ $user->profile->avatar }}" width="40" height="40" title="{{ $user->name }}"></td>
								<td>{{ $user->email}}</td>
								<td>
									 <form action="{{ route('users.admin', $user->id) }}" method="post">
									 	{{ csrf_field() }}
									 	<div class="form-group">
									 		<button type="submit" class="btn {{ $user->admin ? 'btn-danger' : 'btn-success' }}">
									 			{{ $user->admin ? 'Remove permissions' : 'Make as admin' }}
									 		</button>
									 	</div>
									 </form>
								<td>
									<form action="{{ route('users.destroy', $user->id) }}" method="post">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-danger">DELETE</button>
									</form>
								</td>

								<td>
									<a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">EDIT</a>
								</td>

							</tr>
						@endforeach
					</table>
				@else
					<span class="card">No added users.</span>
				@endif
			</div>
		</div>
	</div>
@endsection
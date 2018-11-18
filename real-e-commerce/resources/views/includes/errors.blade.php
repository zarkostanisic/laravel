@if (count($errors) > 0)
<div class="row justify-content-center mt-3 mb-3">
   	<div class="col-md-6 text-white bg-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
</div>
@endif
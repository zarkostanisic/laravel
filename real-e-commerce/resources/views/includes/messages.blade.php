@if (Session::has('success'))
<div class="row justify-content-center mt-3 mb-3">
   	<div class="col-md-6 text-white bg-success">
		<span>{{ Session::get('success') }}</span>
	</div>
</div>
@endif
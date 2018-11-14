@if (Session::has('success'))
	<script>
		toastr.success("{{ Session::get('success') }}");
	</script>
	
@endif

@if (Session::has('info'))
	<script>
		toastr.info("{{ Session::get('info') }}");
	</script>
	
@endif
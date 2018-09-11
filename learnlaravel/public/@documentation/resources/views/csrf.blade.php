<!DOCTYPE html>
<html>
<head>
	<title>CSRF</title>
</head>
<body>
	<form method="POST" action="<?=route('csrf_submit')?>">
		<!-- @method('PUT')
		@csrf -->
		<input type="submit" name="submit">
	</form>
</body>
</html>
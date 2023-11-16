<!DOCTYPE html>
<html>
<head>
	<title>Subir imagen</title>
</head>
<body>
	<form data-toggle="validator" action = "registrar.php" method = "post" role="form" enctype="multipart/form-data">
		
		<h1>Subir imagen al servidor</h1>

		<input type="text" name="producto">
		<input type="file" name="url_imagen">

		<button type="submit">Registrar</button>

	</form>

</body>
</html>
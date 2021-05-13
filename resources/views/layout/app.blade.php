<!DOCTYPE html>
<html>
<head>
	<title>TVFlick</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Estilos Boostrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="{{ asset( 'css/custom.css' ) }}">

</head>
<body>
	@include('layout.nav')

	@yield('content')

	<!-- JavaScript Boostrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

	<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</body>
</html>
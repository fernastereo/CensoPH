<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<h2>Feedback de CensoPH - San Fernando del Tabor</h2>

	<div>
		<p>Mensaje enviado por: {{ $name }}</p>
		<p>ID Propiedad: {{ $property_id }}
           Apartemento: {{ $property_name }}
           Torre: {{ $tower_name }}</p>
		<p class="text-justify">{{ $comment }}</p>
	</div>
	
</body>
</html>
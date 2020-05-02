<?php
//incluye la clase Libro y CrudLibro
	require_once('crud_libro.php');
	require_once('libro.php');
	$crud= new CrudTienda();
	$producto=new producto();
	//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
	$producto=$crud->obtenerproducto($_GET['id']);
?>
<html>
<head>
	<title>Actualizar producto</title>
</head>
<body>
	<form action='administrar_libro.php' method='post'>
	<table>
		<tr>
			<input type='hidden' name='ID' value='<?php echo $producto->getID()?>'>
			<td>Nombre del producto:</td>
			<td> <input type='text' name='Nombre' value='<?php echo $producto->getNombre()?>'></td>
		</tr>
		<tr>
			<td>Precio:</td>
			<td><input type='text' name='Precio' value='<?php echo $producto->getPrecio()?>' ></td>
		</tr>
		<tr>
			<td>Descripcion:</td>
			<td><input type='text' name='Descripcion' value='<?php echo $producto->getDescripcion()?>' ></td>
		</tr>
		<tr>
			<td>Url de la imagen:</td>
			<td><input type='text' name='Imagen' value='<?php echo $producto->getImagen()?>' ></td>
		</tr>
		<input type='hidden' name='actualizar' value'actualizar'>
	</table>
	<input type='submit' value='Guardar'>
	<a href="admin.php">Volver</a>
</form>
</body>
</html>
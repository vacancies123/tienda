<?php
session_start();


    if(isset($_SESSION['rol'])){
        if(($_SESSION['rol'])=="1"){
            include 'templates/caberera.php';
?>
<!doctype html>
<html lang="es">
  <head>
	<meta charset="utf-8"/>
	<title>Admin</title>

  </head>

  <body>
<div >
<?php
require_once('crud_libro.php');
require_once('libro.php');
$crud=new CrudTienda();
$producto= new producto();
//obtiene todos los libros con el método mostrar de la clase crud
$listaproductos=$crud->mostrar();
?>
	<h1>Mostrar Libros</h1>
<div>
	<table border=1>
		<head>
			<td>Nombre</td>
			<td>Precio</td>
			<td>Descripcion</td>
			<td>Imagen</td>
			<td>Actualizar</td>
			<td>Eliminar</td>
		</head>
		<div>
			<?php foreach ($listaproductos as $producto) {?>
			<tr>
				<td><?php echo $producto->getNombre() ?></td>
				<td><?php echo $producto->getPrecio() ?></td>
				<td><?php echo $producto->getDescripcion() ?></td>
				<td><?php echo $producto->getImagen() ?></td>
				<td><a href="actualizar.php?id=<?php echo $producto->getID()?>&accion=a">Actualizar</a> </td>
				<td><a href="administrar_libro.php?id=<?php echo $producto->getID()?>&accion=e">Eliminar</a>   </td>
			</tr>
			<?php }?>
		</div>
	</table>
	</div>
	</div>
	<div>

<?php 
        }else{
    echo "no eres admin<br>";
?>
<a href=../log.php>logeate</a>

<?php
        }
    }else{
    echo "no eres admin<br>";
?>
<a href=../log.php>logeate2</a>

<?php
      }
      
       include 'templates/pie.php'; 


?>
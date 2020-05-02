<?php
//incluye la clase Libro y CrudLibro
require_once('crud_libro.php');
require_once('libro.php');
 
$crud= new CrudTienda();
$producto= new producto();
 
	// si el elemento insertar no viene nulo llama al crud e inserta un libro
	if (isset($_POST['insertar'])) {
		$producto->setNombre($_POST['Nombre']);
		$producto->setPrecio($_POST['Precio']);
		$producto->setDescripcion($_POST['Descripcion']);
		$producto->setImagen($_POST['Imagen']);
		//llama a la función insertar definida en el crud
		$crud->insertar($producto);
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el libro
	}elseif(isset($_POST['actualizar'])){
		$producto->setID($_POST['ID']);
		$producto->setNombre($_POST['Nombre']);
		$producto->setPrecio($_POST['Precio']);
		$producto->setDescripcion($_POST['Descripcion']);
		$producto->setImagen($_POST['Imagen']);
		$crud->actualizar($producto);
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un libro
	}elseif ($_GET['accion']=='e') {
		$crud->eliminar($_GET['id']);
	// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php 
	}elseif($_GET['accion']=='a'){
		header('Location: actualizar.php');
	}
?>
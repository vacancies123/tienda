<?php
session_start();


    if(isset($_SESSION['rol'])){
        if(($_SESSION['rol'])=="1"){
            include 'templates/caberera.php';
?>

<form action='administrar_libro.php' method='post'>
<ul>
	<table>
		<tr>
			<td>Nombre del producto:</td>
			<td> <input type='text' name='Nombre'></td>
		</tr>
		<tr>
			<td>Precio:</td>
			<td><input type='text' name='Precio' ></td>
		</tr>
		<tr>
			<td>Descripcion:</td>
			<td><input type='text' name='Descripcion' ></td>
		</tr>
		<tr>
			<td>URL de la Imagen:</td>
			<td><input type='text' name='Imagen' ></td>
		</tr>

		<input type='hidden' name='insertar' value='insertar'>
	</table>
	<input type='submit' value='Guardar'>
</form>
	</div>
</ul>
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
<!DOCTYPE html>
<html>
<head>
	<title>registro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body><?php
if (isset($_POST["submit"])){
 $host_db = "localhost";
 $user_db = "id12791729_jose2";
 $pass_db = "-*~>)3Tb7R/=zV7x";
 $db_name = "id12791729_libros";
 $tbl_name = "usuarios";
 
 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $buscarUsuario = "SELECT * FROM $tbl_name
 WHERE username = '$_POST[username]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". "El Nombre de Usuario ya ha sido tomado." . "<br />";

 echo "<a href='registro.php'>Por favor escoga otro Nombre</a>";
 }
 else{

    $buscarcorreo = "SELECT * FROM $tbl_name
    WHERE correo = '$_POST[correo]' ";
   
    $result2 = $conexion->query($buscarcorreo);
   
    $count2 = mysqli_num_rows($result2);
   
    if ($count2 == 1) {
    echo "<br />". "El correo ya ha sido registrado." . "<br />";
   
    echo "<a href='registro.php'>Por favor use otro correo</a>";
    }
    else{



            $form_pass = $_POST['password'];
            
            $hash = password_hash($form_pass, PASSWORD_BCRYPT);

            $query = "INSERT INTO `usuarios` (`ID`, `username`, `password`, `rol id`, `correo`) VALUES (NULL,'$_POST[username]', '$_POST[password]', '2', '$_POST[correo]')";

            if ($conexion->query($query) === TRUE) {
            
            echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
            echo "<h4>" . "Bienvenido: " . $_POST['username'] . "</h4>" . "\n\n";
            echo "<h5>" . "Hacer Login: " . "<a href='log.php'>Login</a>" . "</h5>"; 
            }

            else {
            echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
            }
     }
 }
 mysqli_close($conexion);
}
?>
<table class="table table-light table-bordered">
    <tbody>
    <tr>
    <td colspan="5">
    <h2>REGISTRO</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
                 <hr />
                 <h3>Crea una cuenta</h3>
                
                 <!--Nombre Usuario-->
                 <label for="nombre">Nombre de Usuario:</label><br>
                 <input type="text" name="username" maxlength="32" required>
                 <br/><br/>
                
                 <!--Password-->
                 <label for="pass">Password:</label><br>
                 <input type="password" name="password" maxlength="8" required>
                
                 <br/><br/>
                
                  <!--Password-->
                  <label for="pass">Correo:</label><br>
                 <input type="email" name="correo"  required>
                
                 <br/><br/>
                 <input class="btn btn-primary" type="submit" name="submit" value="Registrarme">
                 <input class="btn btn-primary" type="reset" name="clear" value="Borrar">
                 </form>
         </td>
        </tr>
    </tbody>
</table>
</body>
</html>
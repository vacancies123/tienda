<?php

if(isset($_SESSION['CARRITO'])){

    setcookie('CARRITO',serialize($_SESSION['CARRITO']),time()+30000,"/");

    session_destroy(); 
	$_SESSION = array();
    
    	if(isset($_COOKIE[session_name()])) { 
		setcookie(session_name(),'', time() - 42000, '/');
	}
header('location: index.php');
}

?>
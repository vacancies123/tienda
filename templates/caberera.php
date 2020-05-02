<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tienda</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="index.php"><img src="templates/logo.png" alt=""></a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="mostrarCarrito.php" tabindex="-1" aria-disabled="true">carrito (<?php 
                    
										if (isset($_SESSION['rol'])) {
											
											if (empty($_SESSION['CARRITO'])) {
												echo 0;
											
											}else{
												$numer= count($_SESSION['CARRITO']);
												echo $numer;
											}
										}else{
											
											if (!isset($_COOKIE['pepec'])) {
												
												echo 0;
											}else{
												
												$data=unserialize($_COOKIE['pepec'],["allowed_classes" => true]);
												
												if (empty($datos)) {
													echo 0;
												}else{

													foreach($datos as $indice=>$producto){
														$numer = $indice;
													}
													echo $numer+1;
												}
											}
										}
									?>)</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="log.php">log <span class="sr-only">(current)</span></a>
                </li>
                <?php
                    if(!isset($_SESSION['rol'])=="0"){
                        include 'nav/cerrar.php';
                    }
                    ?>
                <?php
                    if(isset($_SESSION['rol'])=="0"){
                        include 'nav/log.php';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
</br>
</br>
<div class="container"> 
<?php
include 'global/sesion.php';
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/caberera.php';
?>

<?php
if($_POST){
    $total=0;
    $SID=$_SESSION['ID'];
    $Correo=$_POST['email'];
    foreach($_SESSION['CARRITO'] as $indice=>$producto){  
        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
    }
    $sentencia=$pdo->prepare("INSERT INTO `ventas` (`ID`, `Clave`, `Paypal`, `Fecha`, `Correo`, `Total`, `status`) 
    VALUES (NULL,:clave, '', NOW(),:correo,:total, 'pendiente');");
    
    $sentencia->bindParam(":clave",$SID);
    $sentencia->bindParam(":correo",$Correo);
    $sentencia->bindParam(":total",$total);
    $sentencia->execute();
    $idventa=$pdo->lastInsertId();

    foreach($_SESSION['CARRITO'] as $indice=>$producto){

    $sentencia=$pdo->prepare("INSERT INTO 
    `detalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) 
    VALUES (NULL,:IDVENTA,:IDPRODUCTO,:PRECIOUNITARIO,:CANTIDAD, '0');");

    $sentencia->bindParam(":IDVENTA",$idventa);
    $sentencia->bindParam(":IDPRODUCTO",$producto['ID']);
    $sentencia->bindParam(":PRECIOUNITARIO",$producto['PRECIO']);
    $sentencia->bindParam(":CANTIDAD",$producto['CANTIDAD']);
    $sentencia->execute();

    }
}
?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
<div class="jumbotron text-center">
    <h1 class="display-4">PASO FINAL</h1>
    <hr class="my-4">
    <p class="lead">vas a pagar con paypal la cantidad de : <h4><?php echo number_format($total,2); ?>€</h4> </p>
    <div id="paypal-button-container"></div>
    <p>Los productos se podran descargar cuando se procese el pago</p>
</div>

<script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total ?>'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }


        }).render('#paypal-button-container');
    </script>
<?php
include 'templates/pie.php';
?>
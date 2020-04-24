<?php
$servername = "localhost";
$username = "usuario";
$password = "admin";
$dbname = "formulario";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// prepare and bind
$stmt = $conn->prepare("DELETE FROM `shipping-info` WHERE `address`=?" );
$stmt->bind_param("s", $address);

$address = $_GET["address"];
$municipality= $_GET["municipality"];
$citystate = $_GET["city-state"];
$zipcode = $_GET["zip-code"];


$stmt->execute();

$stmt->close();
$conn->close();

?>
<h1>Directorio Baja - Realizada</h1>
Dirección: <?php echo $_GET["address"]; ?><br>
Ciudad: <?php echo $_GET["city-state"]; ?><br>
Código Postal: <?php echo $_GET["zip-code"]; ?><br>
<a role="button" class="btn btn-info" href="formulario.html">Regresar</a>

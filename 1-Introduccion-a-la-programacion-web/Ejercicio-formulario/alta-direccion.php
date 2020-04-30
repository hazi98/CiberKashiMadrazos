<?php
$servername = "localhost";
$username = "usuario";
$password = "admin";
$dbname = "formulario";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Primer query
$connstring ="INSERT INTO `shipping-info`(`address`, `municipality`, `city-state`, `zip-code`, `fk_id`) VALUES (?, ?, ?, ?, ?)";
$connstring = mysqli_real_escape_string($conn, $connstring);
$stmt = $conn->prepare($connstring);
$stmt->bind_param("sssii", $address, $municipality, $citystate, $zipcode, $fk_id);

$address = $_POST["address"] ?? '';
$municipality = $_POST["municipality"] ?? '';
$citystate = $_POST["city-state"] ?? '';
$zipcode = $_POST["zip-code"] ?? '';
$fk_id = $_POST["fk_id"] ?? '';

$stmt->execute();
$stmt->close();

// Segundo query
$connstring ="INSERT INTO `shipping-cart` (units , shipping , envelope, fk_id) VALUES (?, ?, ?, ?)";
$connstring = mysqli_real_escape_string($conn, $connstring);
$stmt = $conn->prepare($connstring);
$stmt->bind_param("issi", $units,$shipping, $envelope, $fk_id);

$units = $_POST["units"];
$shipping = $_POST["shipping"];
$envelope = $_POST["envelope"];

$stmt->execute();

$stmt->close();
$conn->close();
?>

<h3>Alta Direccion</h3>
Direccion:<?php echo $_POST["address"]; ?> <br>
Municipio:<?php echo $_POST["municipality"]; ?> <br>
Unidades:<?php echo $_POST["units"]; ?> <br>

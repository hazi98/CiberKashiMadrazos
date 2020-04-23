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
$stmt = $conn->prepare("DELETE FROM `personal-info`WHERE `first-name` =?" );
$stmt->bind_param("s", $firstname);

$firstname = $_GET["first-name"];
$middlename= $_GET["middle-name"];
$lastname = $_GET["last-name"];
$age = $_GET["age"];
$gender = $_GET["gender"];
$email = $_GET["email"];
$phonenumber = $_GET["phone-number"];

$stmt->execute();

$stmt->close();
$conn->close();

?>
<h1>Directorio Baja - Realizada</h1>
Nombre: <?php echo $_GET["fist-name"]; ?><br>
Correo: <?php echo $_GET["email"]; ?><br>
Celular: <?php echo $_GET["phonenumber"]; ?><br>

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
$stmt = $conn->prepare("UPDATE `personal-info` SET `first-name`=?, `middle-name`=?, `last-name`=?, age=?, gender=?, email=?, `phone-number`=? WHERE id=?");
$stmt->bind_param("sssissii", $firstname, $middlename, $lastname, $age, $gender, $email, $phonenumber, $id);
$firstname = $_POST["first-name"];
$middlename= $_POST["middle-name"];
$lastname = $_POST["last-name"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$phonenumber = $_POST["phone-number"];
$id = $_POST["id"];

$stmt->execute();

$stmt->close();
$conn->close();

?>
<h1>Formulario Modificación - Realizada</h1>
Nombre: <?php echo $_POST["first-name"]; ?><br>
Correo: <?php echo $_POST["email"]; ?><br>
Celular: <?php echo $_POST["phone-number"]; ?><br>
<a role="button" class="btn btn-info" href="formulario.html">Regresar</a>


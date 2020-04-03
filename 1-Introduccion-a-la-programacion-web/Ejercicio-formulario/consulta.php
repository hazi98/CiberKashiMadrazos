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

$stmt = $conn->prepare("SELECT `first-name`, `middle-name`, `last-name`, age, gender, email, `phone-number`, id FROM `personal-info` ");

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows>0)
{
	echo '<table class="table table-hover table-responsive">';
	echo"<tr><th>id</th><th>Nombre</th><th>Edad</th><th>Género</th><th>Correo</th><th>Celular</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["id"] ."</td><td>" . $row["first-name"]. ' '. $row["middle-name"]. ' ' . $row["last-name"]. "</td><td> " . $row["age"]. "</td><td> " . $row["gender"]. "</td><td> " . $row["email"]. "</td><td>" . $row["phone-number"]. "</td></tr>";
    }
	echo '</table>';
}//if
else
{
	echo 'No hay registros';
}//else
	

$stmt->close();
$conn->close();


?>
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

$campo = $_POST["campo"];
$valor = $_POST["valor"];
$sqlcommand = "";

switch($campo)
{
	case "first-name":
        $sqlcommand = "SELECT `first-name`, `middle-name`, `last-name`, `age`, `gender`, `email`, `phone-number`, id FROM `personal-info` WHERE `first-name`=?";
		break;
	case "email":
		$sqlcommand = "SELECT `first-name`, `middle-name`, `last-name`, `age`, `gender`, `email`, `phone-number`, id FROM `personal-info` WHERE email=?";
		break;
	case "phone-number":
		$sqlcommand = "SELECT `first-name`, `middle-name`, `last-name`, `age`, `gender`, `email`, `phone-number`, id FROM `personal-info` WHERE `phone-number`=?";
		break;
    case "middle-name":
        $sqlcommand = "SELECT `first-name`, `middle-name`, `last-name`, `age`, `gender`, `email`, `phone-number`, id FROM `personal-info` WHERE `middle-name`=?";
        break;
    case "last-name":
        $sqlcommand = "SELECT `first-name`, `middle-name`, `last-name`, `age`, `gender`, `email`, `phone-number`, id FROM `personal-info` WHERE `last-name`=?";       
         break;
}

$stmt = $conn->prepare($sqlcommand);
$stmt->bind_param("s",$valor);

if($stmt->execute())
{
    $result = $stmt->get_result();
    if(mysqli_num_rows($result) == 0)
    {
        echo "<p>No se encontró un resultado</p>";
        exit();
    }
    else{
        echo '<table class="table table-hover table-responsive">';
        echo"<tr><th>id</th><th>Nombre</th><th>Edad</th><th>Género</th><th>Correo</th><th>Celular</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["id"] ."</td><td>" . $row["first-name"]. ' '. $row["middle-name"]. ' ' . $row["last-name"]. "</td><td> " . $row["age"]. "</td><td> " . $row["gender"]. "</td><td> " . $row["email"]. "</td><td>" . $row["phone-number"]. "</td></tr>";
        }
        echo '</table>';
    }
	
}

$stmt->close();
$conn->close();

?>
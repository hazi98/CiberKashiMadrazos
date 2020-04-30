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
	case "address":
        $sqlcommand = "SELECT `address`, `municipality`, `city-state`, `zip-code`, `id`, `fk_id` FROM `shipping-info` WHERE `address`=?";
		break;
	case "municipality":
		$sqlcommand = "SELECT `address`, `municipality`, `city-state`, `zip-code`, `id`, `fk_id` FROM `shipping-info` WHERE `municipality`=?";
		break;
	case "city-state":
		$sqlcommand = "SELECT `address`, `municipality`, `city-state`, `zip-code`, `id`, `fk_id` FROM `shipping-info` WHERE `city-state`=?";
		break;
    case "zip-code":
        $sqlcommand = "SELECT `address`, `municipality`, `city-state`, `zip-code`, `id`, `fk_id` FROM `shipping-info` WHERE `zip-code`=?";
        break;
    case "fk_id":
        $sqlcommand = "SELECT `address`, `municipality`, `city-state`, `zip-code`, `id`, `fk_id` FROM `shipping-info` WHERE `fk_id`=?";       
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
        echo"<tr><th>Calle y numero</th><th>Municipio / Alcaldia</th><th>Ciudad / Estado</th><th>Código postal</th><th>ID</th><th>ID Persona</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["address"] ."</td><td>" . $row["municipality"]. "</td><td>" . $row["city-state"]. "</td><td>" . $row["zip-code"]. "</td><td> " . $row["id"]. "</td><td> " . $row["fk_id"]. "</td></tr>";
        }
        echo '</table>';
    }
	
}

$stmt->close();
$conn->close();

?>
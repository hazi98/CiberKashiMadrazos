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

$stmt = $conn->prepare("SELECT `address`, `municipality`, `city-state`, `zip-code`, `id`, `fk_id` FROM `shipping-info` WHERE `id`=?");
$stmt->bind_param("i",$id);

$id = $_POST["id"];

if($stmt->execute())
{

        $result= $stmt->get_result();
        if(mysqli_num_rows($result) == 0)
    {
        echo "<p>No se encontró un resultado</p>";
        exit();
    }
		echo '<table class="table table-hover table-responsive">';
        echo"<tr><th>Calle y numero</th><th>Municipio / Alcaldia</th><th>Ciudad / Estado</th><th>Código postal</th><th>ID</th><th>ID Persona</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["address"] ."</td><td>" . $row["municipality"]. "</td><td>" . $row["city-state"]. "</td><td>" . $row["zip-code"]. "</td><td> " . $row["id"]. "</td><td> " . $row["fk_id"]. "</td></tr>";
        }
        echo '</table>';
		
}
else
{
	echo "No existe registro";
}	

$stmt->close();
$conn->close();


?>

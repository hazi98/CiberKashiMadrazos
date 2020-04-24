<html>

<body>
    <form >
        <h1>Buscar por clave </h1>
        </br>
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

$stmt = $conn->prepare("SELECT `first-name`, id FROM `personal-info` ");

$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows>0)
{
    while($row = $result->fetch_assoc()) {
        echo '<a href="busca_procesa3.php?id='. $row["id"]. '">'. $row["first-name"] .'</a></br>';
    }
}//if
else
{
?>
        <p>No hay registros</p>
<?php
}//else
	
$stmt->close();
$conn->close();

?>
    </form>

</body>

</html>
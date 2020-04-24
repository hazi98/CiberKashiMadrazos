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

$stmt = $conn->prepare("SELECT `address`, `municipality`, `city-state`, `zip-code`FROM `shipping-info` WHERE id=?");
$stmt->bind_param("i",$id);

$id = $_GET["id"];

if($stmt->execute())
{
	$stmt->bind_result($address,  $municipality, $citystate, $zipcode);
	//$result= $stmt->get_result();
	$stmt->fetch();

?>
	<form action="baja_direccion_procesa.php" method="get">
		<h1> Formulario - Baja - Confirmación</h1>
		<br>
        Dirección: <input type="text" name="address" value="<?php echo $address;?>"><br>
        Municipio Paterno: <input type="text" name="municipality" value="<?php echo $municipality;?>"><br>
        Ciudad / Estado: <input type="text" name="city-state" value="<?php echo $citystate;?>"><br>
        Codigo postal: <input type="int" name="zip-code" value="<?php echo $zipcode;?>"><br>
		<br>
		<input type="submit" value="Borrar" >
	</form>
<?php
}
else
{
	echo "No existe el registro";
}
?>
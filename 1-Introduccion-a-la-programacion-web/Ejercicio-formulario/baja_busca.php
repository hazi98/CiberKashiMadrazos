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

$stmt = $conn->prepare("SELECT `first-name`, `middle-name`, `last-name`, age, gender, email, `phone-number` FROM `personal-info` WHERE id=?");
$stmt->bind_param("i",$id);

$id = $_GET["id"];

if($stmt->execute())
{
	$stmt->bind_result($firstname,  $middlename, $lastname, $age, $gender, $email, $phonenumber);
	$stmt->fetch();

?>
	<form action="baja_procesa.php" method="get">
		<h1> Formulario - Baja - Confirmación</h1>
		<br>
        Nombre: <input type="text" name="first-name" value="<?php echo $firstname;?>"><br>
        Apellido Paterno: <input type="text" name="middle-name" value="<?php echo $middlename;?>"><br>
        Apellido Materno: <input type="text" name="last-name" value="<?php echo $lastname;?>"><br>
        Edad: <input type="int" name="age" value="<?php echo $age;?>"><br>
        Género: <input type="text" name="gender" value="<?php echo $gender;?>"><br>
        Correo: <input type="text" name="email" value="<?php echo $email;?>"><br>
		Celular: <input type="int" name="phone-number" value="<?php echo $phonenumber;?>"><br>
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
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

$id = $_POST["id"];

if($stmt->execute())
{
	$stmt->bind_result($firstname,  $middlename, $lastname, $age, $gender, $email, $phonenumber);
	$stmt->store_result();
	if($stmt->num_rows == 0){
		echo "No existe registro.";
	}
	else{
		$stmt->fetch();


?>
	<form action="modifica_procesa.php" method="post">
		<h2>Modificar datos</h2>
		<br>
		<div class="form-group row my-3">
			<label for="id" class="col-sm-2 col-form-label modifica-label" id="label-id">ID</label>
			<div class="col-sm-10">
				<input class="form-control" id="id" type="number" name="id" readonly value="<?php echo $id;?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="first-name" class="my-2 col-sm-2 col-form-label modifica-label" id="label-first-name">Nombre</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="first-name" id="input-first-name" value="<?php echo $firstname;?>">
			</div>
			<label for="middle-name" class="my-2 col-sm-2 col-form-label modifica-label" id="label-middle-name">Apellido Paterno</label>
			<div class="col-sm-10" >
				<input class="form-control" type="text" id="input-middle-name" name="middle-name" value="<?php echo $middlename;?>">
			</div>
			<label for="last-name" class="my-2 col-sm-2 col-form-label modifica-label" id="label-last-name">Apellido Materno</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" id="input-last-name" name="last-name" value="<?php echo $lastname;?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="age" class="col-sm-2 col-form-label modifica-label" id="label-edad">Edad</label>
			<div class="col-sm-10">
				<input class="form-control" type="number" id="age" name="age" min="0" value="<?php echo $age;?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="gender" class="col-sm-2 col-form-label modifica-label" id="label-genero">Género</label>
			<div class="col-sm-10 btn-group btn-group-toggle" data-toggle="buttons">
				<label class="btn btn-secondary <?php echo ($gender == 'Hombre' ) ? 'active' : '' ;?> ">
					<input type="radio" name="gender" value="Hombre" <?php echo ($gender == 'Hombre' ) ? 'checked' : '' ;?>>Hombre
				</label>
				<label class="btn btn-secondary <?php echo ($gender == 'Mujer' ) ? 'active' : '';?> ">
					<input type="radio" name="gender" value="Mujer" <?php echo ($gender == 'Mujer' ) ? 'checked' : '';?>> Mujer
				</label>
				<label class="btn btn-secondary <?php echo ($gender == 'Otro' ) ? 'active' : '';?> ">
					<input type="radio" name="gender" value="Otro" <?php echo ($gender == 'Otro' ) ? 'checked' : '';?>> Otro
				</label>
			</div>
		</div>
		<div class="form-group row">
			<label for="email" class="col-sm-2 col-form-label modifica-label" id="label-correo">Correo</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" id="email" name="email" value="<?php echo $email;?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="phone-number" class="col-sm-2 col-form-label modifica-label" id="label-celular">Celular</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" id="phone-number" name="phone-number" value="<?php echo $phonenumber;?>">
			</div>
		</div>
		<br>
		<input type="submit" class="btn btn-primary" value="Modificar">
	</form>
<?php
	}

}
else
{
	echo "No existe el registro";
}
?>
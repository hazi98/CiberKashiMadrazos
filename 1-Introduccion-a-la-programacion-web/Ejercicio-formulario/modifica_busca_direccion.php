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

$stmt = $conn->prepare("SELECT `address`, `municipality`, `city-state`, `zip-code`, `id`, `fk_id` FROM `shipping-info` WHERE id=?");
$stmt->bind_param("i",$id);

$id = $_POST["id"];

if($stmt->execute())
{
	$stmt->bind_result($address, $municipality, $citystate, $zipcode, $id, $fk_id);
	$stmt->store_result();
	if($stmt->num_rows == 0){
		echo "No existe registro.";
	}
	else{
		$stmt->fetch();


?>
	<form action="modifica_procesa_direccion.php" method="post" class="form col-md">
		<h2>Modificar datos</h2>
		<div class="form-group row">
			<label for="id" class="my-2 col-sm-4 col-form-label modifica-label" id="label-id">ID</label>
			<div class="col-sm-8">
				<input class="form-control" id="id" type="number" name="id" readonly value="<?php echo $id;?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="input-address" class="my-2 col-sm-4 col-form-label modifica-label" id="label-address">Calle y numero</label>
			<div class="col-sm-8">
				<input class="form-control" type="text" name="address" id="input-address" value="<?php echo $address;?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="input-municipality" class="my-2 col-sm-4 col-form-label modifica-label" id="label-municipality">Municipio / Alcaldia</label>
			<div class="col-sm-8" >
				<input class="form-control" type="text" id="input-municipality" name="municipality" value="<?php echo $municipality;?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="input-city-state" class="my-2 col-sm-4 col-form-label modifica-label" id="label-city-state">Ciudad / Estado</label>
			<div class="col-sm-8">
				<input class="form-control" type="text" id="input-city-state" name="city-state" value="<?php echo $citystate;?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="input-zip-code" class="col-sm-4 col-form-label modifica-label" id="label-zip-code">Código postal</label>
			<div class="col-sm-8">
				<input class="form-control" type="number" id="input-zip-code" name="zip-code" min="0" value="<?php echo $zipcode;?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="input-fk_id" class="col-sm-4 col-form-label modifica-label">ID de la Persona</label>
			<div class="col-sm-8">
				<select name="fk_id" id="input-fk_id" class="form-control"></select>
			</div>
		</div>
		<br>
		<input type="submit" class="btn btn-primary" value="Modificar">
	</form>
	<script>
		$(document).ready(function () {
			actualizaIDs();
		})

		function actualizaIDs() {
            $.get('getids.php', function (data, status) {
                if (status === "success") {
                    var ids = JSON.parse(data);
                    $('#input-fk_id').html('');
                    $.each(ids, function (key, value) {
                        $('#input-fk_id').append(
                            $("<option></option>").attr("value", value.id).text(value.name));
					});
					$('#input-fk_id').val(<?php echo $fk_id?>).change();
                }
            });
        }
	</script>
<?php
	}

}
else
{
	echo "No existe el registro";
}
?>
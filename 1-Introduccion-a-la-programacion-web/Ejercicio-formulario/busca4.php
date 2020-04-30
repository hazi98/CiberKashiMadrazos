<html>
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Envios.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="XML_JSON.js"></script>

</head>
<body>
<div class="container p-5">
        <div id="encabezado" class="row">
            <div class="encabezado col-md">
                <img class="mx-3" src="box.svg" alt="logo" width="60px">
                <h1 class="encabezado-text col"><span>
                        envios
                    </span>
                    <span class="com">.com</span>
                </h1>
            </div>

        </div>
        <div class="row py-3">
            <h2>Buscar con Links </h2>
        </div>

    <form id="form-busca" class="form">
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
        echo '<h3><a class="badge badge-info" target="busca_procesa3.php?id='. $row["id"]. '">'. $row["first-name"] .'</a></h3>';
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
    <div class="row" id="resultado-busca">

    </div>
</body>

<script>
    $(document).ready(function () {
        $('a').click(function(){
            var target = $(this).attr('target');
            $.get(target, function(data){
                $("#resultado-busca").html(data);
            })
        })
    });
</script>
</html>
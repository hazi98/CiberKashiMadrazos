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
    <link rel="stylesheet" href="materialdesignicons.min.css">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Envios.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
            <h2>Formulario Modificación - Realizada</h2>
        </div>


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

// prepare and bind
$stmt = $conn->prepare("UPDATE `personal-info` SET `first-name`=?, `middle-name`=?, `last-name`=?, age=?, gender=?, email=?, `phone-number`=? WHERE id=?");
$stmt->bind_param("sssissii", $firstname, $middlename, $lastname, $age, $gender, $email, $phonenumber, $id);
$firstname = $_POST["first-name"];
$middlename= $_POST["middle-name"];
$lastname = $_POST["last-name"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$phonenumber = $_POST["phone-number"];
$id = $_POST["id"];

$stmt->execute();

$stmt->close();
$conn->close();

?>
<h3>
Nombre: <?php echo $_POST["first-name"]; ?></br>
Correo: <?php echo $_POST["email"]; ?></br>
Celular: <?php echo $_POST["phone-number"]; ?></br>
</h3>
<a role="button" class="btn btn-info" href="formulario.html">Regresar</a>

</body>
</html>
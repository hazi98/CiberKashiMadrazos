<?php
$servername = "localhost";
$username = "usuario";
$password = "admin";
$dbname = "formulario";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$connstring = "INSERT INTO `personal-info` (`first-name`, `middle-name`, `last-name`, age, gender, email, `phone-number`) VALUES (?, ?, ?, ?, ?, ?, ?)";
$connstring = mysqli_real_escape_string($conn, $connstring);
$stmt = $conn->prepare($connstring);
$stmt->bind_param("sssissi", $firstname, $middlename, $lastname, $age, $gender, $email, $phonenumber);

$firstname = $_POST["first-name"];
$middlename= $_POST["middle-name"];
$lastname = $_POST["last-name"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$phonenumber = $_POST["phone-number"];

$object = new stdClass;
$object->firstname = $firstname;
$object->middlename = $middlename;
$object->lastname = $lastname;
$object->age = $age;
$object->gender = $gender;
$object->email = $email;
$object->phonenumber = $phonenumber;

if($stmt->execute()){
    // Regresar un JSON
    header('Content-type: application/json');
    echo json_encode($object, JSON_FORCE_OBJECT);
}

$stmt->close();
$conn->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title></title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "firma";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST["id"];
$meno = $_POST["meno"];
$priezvisko = $_POST["priezvisko"];
$vek = $_POST["vek"];
$pohlavie = $_POST["pohlavie"];

$sql = "UPDATE zamestnanci SET id='$id', meno='$meno', priezvisko='$priezvisko', vek='$vek', pohlavie='pohlavie' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Employee information updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
</body>
</html>
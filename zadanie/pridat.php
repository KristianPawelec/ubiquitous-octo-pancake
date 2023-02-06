
<!DOCTYPE html>
<html>

    <head>

        <title> PHP INSERT DATA </title>

    </head>

    <body>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "firma";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO zamestnanci (id, meno, priezvisko, vek, pohlavie)
VALUES ('5', 'Kristian', 'Pawelec', '21', 'muz')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

    </body>

</html>
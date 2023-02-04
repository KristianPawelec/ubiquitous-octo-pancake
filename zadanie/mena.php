<?php

// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "firma";

$conn = mysqli_connect($host, $user, $password, $dbname);


// Select all names from the table
$sql = "SELECT * FROM zamestnanci;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

// Display the names
if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['meno'] . "<br>";
    }
} else {
    echo "No names found.";
}



?>

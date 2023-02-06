<?php

if(isset($_POST['insert']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "firma";
    
  
    $id = $_POST['id'];
    $meno = $_POST['meno'];
    $priezvisko = $_POST['priezvisko'];
    $vek = $_POST['vek'];
    $pohlavie = $_POST['pohlavie'];
    
  

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
   

    $query = "INSERT INTO `zamestnanci`('id', `meno`, `priezvisko`, `vek`, 'pohlavie') 
    VALUES ('$id','$meno','$priezvisko','$vek', '$pohlavie')";
    
    $result = mysqli_query($connect,$query);
    
}
?>
<!DOCTYPE html>
<html>

    <head>

        <title> PHP INSERT DATA </title>

    </head>

    <body>
        <form action="pridat.php" method="post">
            <input type="number" name="id" required placeholder="id"><br><br>

            <input type="text" name="meno" required placeholder="meno"><br><br>

            <input type="text" name="priezvisko" required placeholder="priezvisko"><br><br>

            <input type="number" name="vek" required placeholder="vek" min="10" max="100"><br><br>

            <input type="text" name="pohlavie" required placeholder="pohlavie"><br><br>

            <input type="submit" name="insert" value="Add Data To Database">

        </form>

    </body>

</html>
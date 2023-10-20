<html>
<style>
.container{
	position:relative;
	top:0px;
	left:0px;
}
.pc {
   position: absolute;
   z-index: 1;
   padding: 2px;
   color: #FFFFFF;
   background-color: #92AD40;
}
.notebook {
   position: absolute;
   z-index: 1;
   padding: 2px;
   color: #FFFFFF;
   background-color: #a4d600;
}

.printer{
	position: absolute;
   z-index: 1;
   padding: 2px;
   color: #FFFFFF;
   background-color: #0080FF;
}
.ups{
	position: absolute;
   z-index: 1;
   padding: 2px;
   color: #FFFFFF;
   background-color: #38598b;
}
.device{
	position: absolute;
   z-index: 1;
   padding: 2px;
   color: #FFFFFF;
   background-color: #38598b;
}
img{
  position:relative;
  z-index:0;
 
}
</style>
<body  onclick="showClickPosition(event)">

<div class="container"><?php

// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "mapa";

$conn = mysqli_connect($host, $user, $password, $dbname);

$type[1] = "pc";
$type[2] = "notebook";
$type[3] = "printer";
$type[4] = "ups";
$type[5] = "display";
// Select all names from the table
$sql = "SELECT * FROM devices;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

// Display the names
if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {?>
	<div id='<?php echo $row['id'];?>' class="<?php echo $type[$row['device_type']];?>" style="top:<?php echo $row['position_top'];?>px;left:<?php echo $row['position_left'];?>px"><?php echo $row['name'];?></div>
     <?php   
    }
} else {
    echo "No names found.";
}

?>
  PC: <input type="checkbox" id="myCheck" onclick="checkPC()" checked>
  Notebook: <input type="checkbox" id="myCheck" onclick="checkNTB()" checked>
  Tlačiareň: <input type="checkbox" id="myCheck" onclick="checkPrinter()" checked>
  UPS: <input type="checkbox" id="myCheck" onclick="checkUPS()" checked>
  Monitor: <input type="checkbox" id="myCheck" onclick="checkDisplay()" checked>
  <img id='img' src="images/3NP.png">
</div>

<script>
 function showClickPosition(event) {
         var img = document.getElementById('img');
  var rect = img.getBoundingClientRect();
  var x = event.clientX - rect.left;
  var y = event.clientY - rect.top;
  alert("You clicked at position: x=" + event.offsetX + ", y=" + event.offsetY);
      }
function checkPC()
{
	var x = document.getElementsByClassName("pc");
	for (let index = 0; index < x.length; index++) {
		if (x[index].style.display === "none") {
		x[index].style.display = "block";
	} else {
		x[index].style.display = "none";
	}
}
}
function checkNTB()
{
	var x = document.getElementsByClassName("notebook");
	for (let index = 0; index < x.length; index++) {
		if (x[index].style.display === "none") {
		x[index].style.display = "block";
	} else {
		x[index].style.display = "none";
	}
}
}
function checkPrinter()
{
	var x = document.getElementsByClassName("printer");
	for (let index = 0; index < x.length; index++) {
		if (x[index].style.display === "none") {
		x[index].style.display = "block";
	} else {
		x[index].style.display = "none";
	}
}
}
function checkUPS()
{
	var x = document.getElementsByClassName("ups");
	for (let index = 0; index < x.length; index++) {
		if (x[index].style.display === "none") {
		x[index].style.display = "block";
	} else {
		x[index].style.display = "none";
	}
}
}
function checkDisplay()
{
	var x = document.getElementsByClassName("display");
	for (let index = 0; index < x.length; index++) {
		if (x[index].style.display === "none") {
		x[index].style.display = "block";
	} else {
		x[index].style.display = "none";
	}
}
}
   document.addEventListener("contextmenu", (event) => {
         event.preventDefault();
      });
 </script>


</body>
</html>
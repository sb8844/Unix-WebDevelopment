<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="w3-bar w3-black">
  <a href="projectLinks.html" class="w3-bar-item w3-button">Home</a>
  <a href="upload1.php" class="w3-bar-item w3-button">Upload</a>
  <a href="searchFiles.html" class="w3-bar-item w3-button">Search</a>
  <a href="viewFile1.php" class="w3-bar-item w3-button">View</a>
</div>
<div>
<?php
$database = '';
$password = '';
$db = mysqli_connect('', $database, $password);
if(!$db){
  die("Connection Failed: " .mysqli_connect_error());
}
echo "Connected Successfully";

$id= $_GET["id"];
$record = " Delete FROM project WHERE id=$id";
$result = mysqli_query($db, $record);
echo "<br>Your file has been deleted.<br>";
 ?>
</div>
 <!--<a href="viewFile1.php">Return to table</a>-->
</html>


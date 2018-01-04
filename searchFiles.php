<html>
<body>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="w3-bar w3-black">
  <a href="projectLinks.html" class="w3-bar-item w3-button">Home</a>
  <a href="upload1.php" class="w3-bar-item w3-button">Upload</a>
  <a href="searchFiles.html" class="w3-bar-item w3-button">Search</a>
  <a href="viewFile1.php" class="w3-bar-item w3-button">View</a>
</div>

<?php
$searchBy = $_POST['field'];
$searchFor = $_POST['term'];
// database name and password
$database = '';
$password = '';
$db = mysqli_connect('', $database, $password);

$record = "SELECT * FROM project WHERE $searchBy LIKE '%".$searchFor."%'";
$result = mysqli_query($db, $record);


while($myrow = mysqli_fetch_array($result))
{
if ($searchBy === "user"){
  if ($myrow['user'] === $searchFor) {
  echo "<br><br>File Name: <a href= ".$myrow["filename"].">".$myrow["filename"]."</a>";
  echo "<br> User: ".$myrow['user'];
  } else {
	$r="There were no entries";
  }
} elseif ($searchBy === "filename") {
  if ($myrow['filename'] === $searchFor){
    echo "<br><br>File Name: <a href= ".$myrow["filename"].">".$myrow["filename"]."</a>";
    echo "<br> User: ".$myrow['user'];
  } else {
  $s="There were no entries";
  }
} else {
  $t="ERROR";
}
}

echo $s;
echo $r;
echo $t;

?>

</body>
</html>

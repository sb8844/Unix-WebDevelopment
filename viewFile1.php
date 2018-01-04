<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
#text {
  margin: 10px;
  padding: 3px;
}
table , th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
	padding: 2px;
}


</style>
</head>
<div class="w3-bar w3-black">
  <a href="projectLinks.html" class="w3-bar-item w3-button">Home</a>
  <a href="upload1.php" class="w3-bar-item w3-button">Upload</a>
  <a href="searchFiles.html" class="w3-bar-item w3-button">Search</a>
  <a href="viewFile1.php" class="w3-bar-item w3-button">View</a>
</div>

<div id="text">
Click on the link in the Files column to view the file. If there is no name under the user then the user wanted to remain anonymous.
</div>
<br>
<?php
// enter database and password
$database = '';
$password = '';

$db = mysql_connect('', $database, $password);
mysql_select_db($database, $db);

$result = mysql_query("SELECT * FROM project", $db);
echo "<center><table BORDER=2>";
echo "<tr>
      <th> ID </th>
      <th> Files </th>
      <th> File Type </th>
      <th> User </th>      
      <th colspan=2> Options </th>
      </tr>";

      while($myrow = mysql_fetch_array($result)){
        echo "<tr>
<td>".$myrow["id"];
	echo "</td><td><a href= ".$myrow["filename"].">".$myrow["filename"]."</a>";
  echo "</td><td>".$myrow["filetype"];
  echo "</td><td>".$myrow["user"];
        echo "<td><a href=\"deleteFile1.php?id=".$myrow[id]."\">Delete</a>
              </td>";
	echo "<td><a href= \"upload1.php\">Upload</a></td></tr>";
      }
echo "</table></center>";
?>
</html>


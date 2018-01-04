<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
#text {
  margin: 10px;
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
Select a file and click upload to contribute to our user generated file database!<br><br> <b>NOTE:</b> Users <b>DO NOT</b> have to enter a name to upload a file. Leave the user section empty if you wish to remain anonymous.<br><br>
</div>
<div id="form">
<?php 

echo <<<_END
<html><head><style>#form1{padding: 3px; margin: 10px; align: center;} #form2{padding: 3px; margin: 10px; align: center;}</style><title>PHP Form Upload</title></head><body>
<center><form method='post' action='upload1.php' enctype='multipart/form-data' id="form1"></center>
User: 
<input type = "text" name="user" id="form2">
Select File: <input type='file' name='file[]' multiple id="file">
<input type='submit' value='Upload' />
</form></center>

_END;
	// This is a form that uploads a file to the server and updates the database with a link to that 
	// file 
	$myFile = $_FILES["file"];
	$fileCount = count($myFile["name"]);

	$host = "";
	$username = "";
	$password = "";
	$db = mysql_connect($host, $username, $password);
	mysql_select_db($username, $db);
	$filename = $_GET["filename"];
    $id = $_GET["id"];
    $user = $_POST["user"];
        //$filetype = $_GET["filetype"];

if ($_FILES)
{
	// Define file directory
	define(UPLOAD_DIR,"");
   for ($i =0; $i < $fileCount; $i++) {
	$type = $myFile["type"][$i];
	$name = $myFile["name"][$i];
     if (!file_exists(UPLOAD_DIR . $name))
{
	$sql = "INSERT INTO project(filename,user,filetype,id) VALUES('$name','$user','$type','$id')";
	move_uploaded_file($_FILES['file']['tmp_name'][$i], $name);
	$result = mysql_query($sql);
	echo "<br />Uploaded '$name'<br>";
}
else 
{
	echo "Rename" . $name . "file and try again<br>";	
}
}
}
echo "</body</html>";
?>
</div>
</div>

<div>
<script>
function myFunction() {
        alert("Files Uploaded");
}
</script>
</div>

</html>

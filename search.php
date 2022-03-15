<?php

$search = $_POST['search'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "stampscollection";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from records where name like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo $row["name"]."  ".$row["year"]."  ".$row["country"]."<br>";
}
} else {
	echo "0 records";
}

$conn->close();

?>

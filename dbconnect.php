<?php

//TODO: Replace with correct server info
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";
 
$sjsuid=$_POST['sjsu-id'];
$password=$_POST['password'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_select_db($con,"test");
$sql="SELECT * FROM user WHERE id=$sjsuid";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    setcookie("username", $row['sjsu-id']);
    setcookie("password", $row['passworc']);
}
mysqli_close($con);

?>

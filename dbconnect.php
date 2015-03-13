<?php

//TODO: Replace with correct server info
$host = "localhost"; 
$user = ""; 
$pass = ""; 
$db = "dbtest"; 
 
$sjsuid='batman';
$password='1234';
// Create connection
$con = pg_connect("host=$host dbname=$db user=$user password=$pass")
    or die("Could not connect to server\n"); 


$sql="SELECT * FROM login WHERE username='$sjsuid' AND password='$password'";
$result = pg_query($con,$sql) or die("Cannot execute query:");

while($row = pg_fetch_assoc($result)) {
    if($row['username']==$sjsuid && $row['password']==$password)
    {
        setcookie("username", $sjsuid);
    }
}
pg_close($con);

?>

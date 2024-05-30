<?php
$host ="localhost";
$user = "root";
$password ="";
$database ="booking";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error){
    echo("Connection failed:" . $conn->connect_error);
}
echo "<script>console.log('Connection successful.');</script>";
?>
<?php

$servername = "localhost:4306";
$username = "root";
$password = "";
$database = "docverifier";

$conn = mysqli_connect($servername,$username,$password,$database);

if (!$conn)
{
	die("Failed to Connect" . mysqli_connect_error());
}

?>
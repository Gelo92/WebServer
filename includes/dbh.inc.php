<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginsystemtutt";

//Create connection
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

//Check Connection

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

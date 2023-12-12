<?php

	$conn = new mysqli("localhost", "root", "","client information");

if ($conn->connect_error) {
	die("Connection failed: " .$conn_>connect_error);
}

$last = "SELECT MAX(id) AS last_id FROM courses";
$result = mysqli_query($conn, $last);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$last_id = $row['last_id'];

$sql = "UPDATE courses SET Electricity_bill_R=Electricity_bill_R + '$_POST[pname]' WHERE id='$last_id'";
//$query = "SELECT  Electricity_bill_R FROM courses WHERE Electricity_bill_R > 0";

if (mysqli_query($conn,$sql)) 
	header("refresh:1; url=INDEX_DOWNLOAD.php");
	else
		echo "Not Update";


 echo '<a href="http://192.168.43.56/">
      <input type="submit"/>
  </a>';





?>
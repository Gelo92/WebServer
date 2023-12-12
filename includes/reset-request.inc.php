<?php


$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginsystemtutt";

//Create connection
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);



if (isset($_POST["reset-request-submit"])) {
	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);    //authenticate if this is the correct user

	//https://meterg.000webhostapp.com//loginsystem/create-new-password.php
	$url = "http://meterg.000webhostapp.com/create-new-password.php?selector=" .$selector ."&validator=" . bin2hex($token);  //creating link that will be sent to the user

	$expires = date("U") + 1800;

	require 'dbh.inc.php';

	$userEmail = $_POST["email"];

	$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		echo "There was an error!";
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "s", $userEmail);
		mysqli_stmt_execute($stmt);

	}
	
	$sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);"; 
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		echo "There was an error!";
		exit();
	}
	else
	{
		$hashedToken = password_hash($token, PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
		mysqli_stmt_execute($stmt);

	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

	$to = $userEmail;

	$subject = 'Reset your password for meterg';

	$message = '<p>We received a password reset request. The link to reset your password make this request, you can ignore this email</p>'; 
	$message .= '<p>Here is your password reset link: </br>';
	$message .= '<a href="' . $url .'">' . $url . '</a></p>';

	$headers = "From: meterg <gelorhee@gmail.com>\r\n";
	$headers .= "Reply-To: gelorhee@gmail.com\r\n";
	$headers .= "Content-type: text/html\r\n";

	mail($to, $subject, $message, $headers);
	header("Location: ../reset-passsword.php?reset=success");



}
else
{
	header("Location: ../index.php");
}
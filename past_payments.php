<table border="1">
	<tr>
		<th>CustomerKey</th>
		<th>Username</th>
		<th>Email_Address</th>
		<th>Past_Payments</th>
		<th>Current_Balance</th>
		
	</tr>

<?php
$connect=mysqli_connect("localhost", "root", "", "client information") or die("Connection Failed");


$last = "SELECT MAX(id) AS last_id FROM courses";
$resulte = mysqli_query($connect, $last);
$rowe = mysqli_fetch_array($resulte, MYSQLI_ASSOC);
$last_id = $rowe['last_id'];



$query="SELECT  CustomerKey,Username, email_address, Past_Payments, Current_Balance FROM userdetails WHERE CustomerKey=1";
$queryy="SELECT Electricity_bill_R FROM courses WHERE id='$last_id' ";
$result=mysqli_query($connect,$query);
$resultt=mysqli_query($connect,$queryy);


while($row=mysqli_fetch_assoc($result) )
{
	?>
	<tr>
		<td><?php echo $row['CustomerKey']?></td>
		<td><?php echo $row['Username']?></td>
		<td><?php echo $row['email_address']?></td>
		<td><?php echo $row['Past_Payments']; echo"<br/>";?></td>
	<?php	
}


while($rowe=mysqli_fetch_array($resultt) )
{
	?>
		<td><?php echo $rowe['Electricity_bill_R']?></td>	
</tr>
	<?php	
}
?>




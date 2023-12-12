<table border="1">
	<tr>
		<th>CustomerKey</th>
		<th>Username</th>
		<th>Email_Address</th>
		<th>GeneralSupplykWh</th>
	</tr>

<?php
$connect=mysqli_connect("localhost", "root", "", "client information") or die("Connection Failed");
$query="SELECT cr.CustomerKey, cr.GeneralSupplykWh, cd.Username, cd.Email_Address FROM electricityreadings cr, userdetails cd WHERE cr.CustomerKey=cd.CustomerKey ";
$result=mysqli_query($connect,$query);

while($row=mysqli_fetch_assoc($result))
{
	?>
	<tr>
		<td><?php echo $row['CustomerKey']?></td>
		<td><?php echo $row['Username']?></td>
		<td><?php echo $row['Email_Address']?></td>
		<td><?php echo $row['GeneralSupplykWh']?></td>
	</tr>
	<?php
}
?>




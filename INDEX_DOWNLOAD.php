<?php
$conn=new PDO('mysql:host=localhost; dbname=client information', 'root', '') or die(mysql_error());

  $con = mysqli_connect("localhost","root","","client information");

    

?>


<html>
<head>
<title>Upload and Download Files</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">


 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  



</head>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

<style>
</style>
<body>

	<style>

        .center {
    margin: auto;
    width: 700px;
    border:1px solid black;

}

        .btn{
            background-color: red;
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 20px;
        }
        .green{
            background-color: #199319;
        }
        .red{
            background-color: red;
        }


h1
{
    font-family: Times;
    font-size: 3em;
text-align :center;
    border-bottom: 2px solid pink;
    border-right: 2px solid pink;
    width: 695px;
    /*text-align:center;*/
    box-shadow: 4px 4px 5px #888888;
    margin-top: 20px;
}

h2{
     font-family: Times;
     text-align: left;
}

h3{
     font-family: Times;
     text-align :center;
}
 .vertical {
      border-left: 6px solid blue;
      height: 20px;
      position:absolute;
      left: 59%;
    }

       table,tr:nth-child(even) {background-color: #f2f2f2;}

        th{  
            border-width : 1;
            text-align :center;
            border-bottom: 2px solid white;
    border-right: 2px solid white;
            
        }
        td{
            text-align :center;
            border-bottom: 2px solid white;
    border-right: 2px solid white;
        }
    }
    </style>    

      <div class="center"> 

<h1>Approve customer payment</h1>

	<?php

	$con = new mysqli("localhost", "root", "","client information");

if ($con->connect_error) {
	die("Connection failed: " .$con_>connect_error);
}

$last = "SELECT MAX(id) AS last_id FROM courses";
$result = mysqli_query($con, $last);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$last_id = $row['last_id'];

$sql = "SELECT Electricity_bill_R FROM courses WHERE id='$last_id'";

$records = mysqli_query($con, $sql);
	?>

	
		<h2><hr/>Fill-In amount payed<hr/></h2>
	<?php
	while ($row = mysqli_fetch_array($records)) {
		echo "<form action=updateBalance.php method=post>";
		echo "<h4>Amount:</h4><input   type=text  name=pname> ";
		echo "<input type=submit><hr/>";
		echo "</form>";
	}


	?>

 



	    <div class="row-fluid">
	        <div class="span12">
	          
	            	<div class="center">
		<br />
		
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th width="90%" align="center">Files</th>
					<th align="center">Action</th>	
				</tr>
			</thead>
			<?php
			$query=$conn->query("select * from upload order by id desc");
			while($row=$query->fetch()){
				$name=$row['name'];
			?>
			<tr>
			
				<td>
					&nbsp;<?php echo $name ;?>
				</td>
				<td>
					<button class="alert-success"><a href="download.php?filename=<?php echo $name;?>&f=<?php echo $row['fname'] ?>">Download</a></button>
				</td>
			</tr>
			<?php }?>
		</table>
		<button class="btn btn-success" type="submit" name="submit">SUBMIT</button>
		<a class="btn btn-info" type="submit" name="cancel" href="course-customer.php">LOGOUT</a><br>
	</div>
	</div>
	</div>
</div>
</body>
</html>
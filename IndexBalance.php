<!DOCTYPE html>
<html>
<head>
	<title>Update A record on a database</title>
</head>
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

	$conn = new mysqli("localhost", "root", "","client information");

if ($conn->connect_error) {
	die("Connection failed: " .$conn_>connect_error);
}

$last = "SELECT MAX(id) AS last_id FROM courses";
$result = mysqli_query($conn, $last);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$last_id = $row['last_id'];

$sql = "SELECT Electricity_bill_R FROM courses WHERE id='$last_id'";

$records = mysqli_query($conn, $sql);
	?>

	
		<h2><hr/>Fill-In amount payed<hr/></h2>
	<?php
	while ($row = mysqli_fetch_array($records)) {
		echo "<form action=updateBalance.php method=post>";
		echo "<h4>Proof of payment file:</h4><hr/><input   type=text  name=pname> ";
		echo "<input type=submit>";
		echo "</form>";
	}


	?>
</div>
</body>
</html>
<?php
  
    // Connect to database 
    $con = mysqli_connect("localhost","root","","client information");
  
    // Get all the courses from courses table
    // execute the query 
    // Store the result
    $sql = "SELECT * FROM `courses`";
    $Sql_query = mysqli_query($con,$sql);
    $All_courses = mysqli_fetch_all($Sql_query,MYSQLI_ASSOC);
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
           content="width=device-width, initial-scale=1.0">
     
    <!-- Using internal/embedded css -->
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
</head>
  
<body>
  <div class="center"> 
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
        <!-- TABLE TOP ROW HEADINGS-->
        <tr>
             <h1>Customer Meter Readings</h1>
            <th>ID</th>
            <th>Taken_At</th>
            <th>Energy</th>
            <th>Electricity Bill R</th>
            <th>Meter Status</th>
            <th>Toggle</th>
        </tr>
        <div style="width: 100%; background: #f2f2f2; ">   
         <?php
        $sql_energy = "SELECT sum(energy) FROM courses ";
        $sql_balance = "SELECT sum(Electricity_bill_R) FROM courses ";
$result = $con->query($sql_energy);
$resulte = $con->query($sql_balance);
while ($row = mysqli_fetch_array($result)) {
 echo "<h3>";echo "Total Energy Readings of   : ".$row['sum(energy)']; echo "kWh<hr/>"; 
  while ($row = mysqli_fetch_array($resulte))
  {
  echo "    "; echo "Bill Amount:  R" .$row['sum(Electricity_bill_R)'];  echo "<h3></div></div>";
}

  }
            // Use foreach to access all the courses data
            foreach ($All_courses as $course) { ?>
            <tr>
                <td><?php echo $course['id']; ?></td>
                <td><?php echo $course['taken_at']; ?></td>
                <td><?php echo $course['energy']; ?></td>
                <td><?php echo $course['Electricity_bill_R'];
                 ?></td>
                <td><?php 
                        // Usage of if-else statement to translate the 
                        // tinyint status value into some common terms
                        // 0-Inactive
                        // 1-Active
                        if($course['status']=="1") 
                            echo "Active";
                        else 
                            echo "Inactive";
                    ?>                          
                </td>
                <td>
                    <?php 
                     if($course['Electricity_bill_R']=="00.00") 
  
                        // if a course is active i.e. status is 1 
                        // the toggle button must be able to deactivate 
                        // we echo the hyperlink to the page "deactivate.php"
                        // in order to make it look like a button
                        // we use the appropriate css
                        // red-deactivate
                        // green- activate
                        echo 
     "<a href=activate.php onclick=disabled?id=".$course['id']." class='btn green'>Activate</a>";               
                    else 
                        echo 
"<a href=deactivate.php onclick=disabled?id=".$course['id']." class='btn red'>Deactivate</a>";
                    ?>
            </tr>
           <?php
           
                }
                // End the foreach loop 
           ?>
           
       
    </table>
    <br/>
    <form action="INDEX_DOWNLOAD.php" method="post">
            <button type="submit" name="login-submit">VIEW CUSTOMER PAYMENTS</button>
            <br/>



            </form>
<form method='post' action='index_graph.php' name='graph'>
<button type="submit" name="login-submit">View Meter Graph</button>
            <br/></form>

<form action="signup.php" method="post">
            <button type="submit" name="logout-submit">Logout</button>
</form>

</div>
<br/>
<br/>
<br/>







</body>
  
</html>
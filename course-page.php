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
    <h1>Customer Meter Readings</h1>
    <table>
        <!-- TABLE TOP ROW HEADINGS-->

        <tr>
            <th>ID</th>
            <th>Taken_At</th>
            <th>Energy</th>
            <th>Electricity Bill R</th>
            <th>Meter Status</th>
            <th>Toggle</th>
        </tr>
        <tr>
        <div style="width: 100%; background: #f2f2f2; ">   
       <?php
        $sql_energy = "SELECT sum(energy) FROM courses ";
        $sql_balance = "SELECT sum(Electricity_bill_R) FROM courses ";
$result = $con->query($sql_energy);
$resulte = $con->query($sql_balance);
while ($row = mysqli_fetch_array($result)) {
 echo "<h3>";echo "Total Energy Readings of   : ".$row['sum(energy)']; echo "kWh<hr/>"; 
  while ($row_balance = mysqli_fetch_array($resulte))
  {
  echo "    "; echo "Bill Amount:  R" .$row_balance['sum(Electricity_bill_R)'];  echo "<h3></div></div>";
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
                     if($course['status']=="1") 
  
                        // if a course is active i.e. status is 1 
                        // the toggle button must be able to deactivate 
                        // we echo the hyperlink to the page "deactivate.php"
                        // in order to make it look like a button
                        // we use the appropriate css
                        // red-deactivate
                        // green- activate
                        echo 
"<a href=deactivate.php?id=".$course['id']." class='btn red'>Deactivate</a>";
                    else 
                        echo 
"<a href=activate.php?id=".$course['id']." class='btn green'>Activate</a>";
                    ?>
            </tr>
           <?php
           
                }
                // End the foreach loop 
           ?>
           



<?php
$conn=new PDO('mysql:host=localhost; dbname=client information', 'root', '') or die(mysql_error());
if(isset($_POST['submit'])!=""){
  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
  // $caption1=$_POST['caption'];
  // $link=$_POST['link'];
  $fname = date("YmdHis").'_'.$name;
  $chk = $conn->query("SELECT * FROM  upload where name = '$name' ")->rowCount();
  if($chk){
    $i = 1;
    $c = 0;
    while($c == 0){
        $i++;
        $reversedParts = explode('.', strrev($name), 2);
        $tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
    // var_dump($tname);exit;
        $chk2 = $conn->query("SELECT * FROM  upload where name = '$tname' ")->rowCount();
        if($chk2 == 0){
            $c = 1;
            $name = $tname;
        }
    }
}
 $move =  move_uploaded_file($temp,"upload/".$fname);
 if($move){
    $query=$conn->query("insert into upload(name,fname)values('$name','$fname')");
    if($query){
//    header("location: course-page.php");
    }
    else{
    die(mysql_error());
    }
 }
}
?>


          
    </table>
    <div style="width: 100%; background: #f2f2f2; ">  
    <h3><hr/>View Past Payments</h3>
</div>
<table>
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
$result_courses = mysqli_query($connect, $last);
$row_courses = mysqli_fetch_array($result_courses, MYSQLI_ASSOC);
$last_id = $row_courses['last_id'];



$query_user="SELECT  CustomerKey,Username, email_address, Past_Payments, Current_Balance FROM userdetails WHERE CustomerKey=1";
$queryy_courses="SELECT Electricity_bill_R FROM courses WHERE id='$last_id' ";
$result_user=mysqli_query($connect,$query_user);
$result_courses=mysqli_query($connect,$queryy_courses);


while($row_user=mysqli_fetch_assoc($result_user) )
{
    ?>
    <tr>
        <td><?php echo $row_user['CustomerKey']?></td>
        <td><?php echo $row_user['Username']?></td>
        <td><?php echo $row_user['email_address']?></td>
        <td><?php echo $row_user['Past_Payments']; echo"<br/>";?></td>
    <?php   
}


while($row_courses=mysqli_fetch_array($result_courses) )
{
    ?>
        <td><?php echo $row_courses['Electricity_bill_R']?></td>   
</tr>
    <?php   
}
?>

</table>



<h3><p><hr/>Upload Proof Of Payment File</p></h3>

          <form enctype="multipart/form-data" action="" name="form" method="post"> <b>Select File:</b>
                    <input type="file" name="file" id="file"  class="center"/></td>
                    <input type="submit" name="submit" id="submit" value="Submit" class="center"/>
            <hr/></form>

<br />
        
            <table>
                <th> <?php 
            
        
                // End the foreach loop 
           ?></th>

           </form>
<form method='post' action='index_graph.php' name='graph'>
<button type="submit" name="login-submit">View Meter Graph</button></form>
            <br/>

<form action="signup.php" method="post">
            <button type="submit" name="logout-submit">Logout</button>
            </form>

</div>

</body>
  
</html>
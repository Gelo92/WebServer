<?php
$con  = mysqli_connect("localhost","root","","client information");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT * FROM courses";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $productname[]  = $row['taken_at']  ;
            $sales[] = $row['energy'];
        }
 
 }
?>
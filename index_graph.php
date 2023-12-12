<?php require_once 'record_graph.php'; ?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <body>
        <div style="width:60%;hieght:20%;text-align:center">
            <h2 class="page-header">Electricity Meter Readings</h2>
            <h4>Energy(kWh) vs Time Of Reading (TimeStamp)</h4>
            <p style="align:center;"><canvas  id="chartjs_bar"></canvas></p>
        </div>    
<form>
    <h4>Time Of Reading (TimeStamp)</h4><hr/>
     <a class="btn btn-info" type="submit" name="Return To Main Page" href="course-customer.php">Return To Main Page</a><br>
</form>

    </body>
  <script src="js_graph/jquery.js"></script>
  <script src="js_graph/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "powderblue",   
                            ],
                            data:<?php echo json_encode($sales); ?>, 
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                           
                        },
                        
                    },
 

                }
                });


    </script>
</html>
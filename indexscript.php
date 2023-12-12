<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>IlluminaTechs!</title>
  </head>
  <body>
    <h1>Electricity Meter!</h1>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CUSTOMER READINGS</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create.php">Add New</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<table class="table">
  <thead>
    <tr>
      <th scope="col">DATE</th>
      <th scope="col">CUSTOMER KEY</th>
      <th scope="col">TIME OF READING</th>
      <th scope="col">GENERAL SUPPLY kWh</th>

    </tr>
  </thead>
  <tbody>
    <?php
    include "databaseconnection.php";
    $sql = "SELECT * FROM electricityreadings ";
    $result = $conn->query($sql);
    if (!$result){
    die("Invalid query");
  }
  while($row= $result->fetch_assoc()){
  echo" 
  
    <tr>
      <th>$row[Date]</th>
      <td>$row[CustomerKey]</td>
      <td>$row[TimeOfReading]</td>
      <td>$row[GeneralSupplykWh]</td>
    <td>
    
    </td>

    
    </tr>


    ";
  }

  ?>
  </tbody>


   <h3>ACTIONS</h3>

   
  <a class='btn btn-success' href='createscript.php'>Edit</a>
  


    <h1>Turn Electricity OFF/ON</h1>
 
      <a class='btn btn-success' href='editscript.php'>ON</a>
 
      
      
  <h2></h2>
      <form action="includes/logout.inc.php" method="post">
      <button type="submit" name="logout-submit">Logout</button>
      </form> 


</table>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
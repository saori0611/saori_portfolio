<?php
  session_start();
  
  if($_SESSION['status'] !== 'A'){
        header('Location: ../index.php');
        die;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark " id="mainNav">
                <a class="ps-5 py-1" href="../index.php"><img src="../assets/img/logo.png" alt="..." style="width180px; height:55px;"/></a>
                <div class="collapse navbar-collapse bg-dark pe-5" style="height:63px;" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../index.php ">Home</a></li>
                    </ul>            
            </div>
        </nav>
<div class="container mt-5">
  <div class="card mx-auto w-50 my-5 border border-0">
    <div class="card-header bg-white text-dark border-0">
      <h1 class="text-center">WELCOME, <?php echo $_SESSION['username']?></h1>
      <h2 class="text-center">ADMIN DASHBOARD</h2>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-md-4 text-center">
          <a href="rentals.php" class="btn btn-success d-block">Rentals</a>
        </div>

        <div class="col-md-4 text-center">
          <a href="admin-reservation.php" class="btn btn-warning d-block text-white">Reservation</a>
        </div>

        <div class="col-md-4 text-center">
          <a href="users.php" class="btn btn-danger d-block">Users</a>
        </div>
      </div>
    </div>
  </div>

</div>
  
</body>
</html>
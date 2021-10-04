<?php
  include "../action/reservation-action.php";

  $reservation_id = $_GET['reservation_id'];
  $reservation_list = $reservation->displaySpecificReservation($reservation_id);
  // $latest_reservation = $reservation->getLatestReservation();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View reservation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
<!-- <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
                <a class="ps-5 py-1" href="#page-top"><img src="../assets/img/logo.png" alt="..." style="width180px; height:55px;"/></a>
                <div class="collapse navbar-collapse bg-dark pe-5" style="height:63px;" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../index.php ">Home</a></li>
                    </ul>            
            </div>
        </nav> -->
<div class="container mt-5">
  <h1 class="text-center text-success"><?php echo $_SESSION['username'];?>'s Reservation</h1>

    <?php
      if($reservation_list == false){
    ?>
      <p colspan="8" class="text-danger">NO RECORDS FOUND</p>
    <?php
    }else{
    ?>
    <div class="row mb-3 text-center">
      <div class="col-md-6">
        <h1>Name</h1>
      </div>
      <div class="col-md-6">
        <h2><?php echo $reservation_list['username'];?></h2>
      </div>
    </div>

    <div class="row mb-3 text-center">
      <div class="col-md-6">
        <h1>Adult quantity</h1>
      </div>
      <div class="col-md-6">
        <h2><?php echo $reservation_list['adult_quantity'];?></h2>
      </div>
    </div>

    <div class="row mb-3 text-center">
      <div class="col-md-6">
        <h1>Child quantity</h1>
      </div>
      <div class="col-md-6">
        <h2><?php echo $reservation_list['child_quantity'];?></h2>
      </div>
    </div>

    <div class="row mb-3 text-center">
      <div class="col-md-6">
        <h1>Pet quantity</h1>
      </div>
      <div class="col-md-6">
        <h2><?php echo $reservation_list['pet_quantity'];?></h2>
      </div>
    </div>

    <div class="row mb-3 text-center">
      <div class="col-md-6">
        <h1>Check in</h1>
      </div>
      <div class="col-md-6">
        <h2><?php echo $reservation_list['check_in'];?></h2>
      </div>
    </div>

    <div class="row mb-3 text-center">
      <div class="col-md-6">
        <h1>Check out</h1>
      </div>
      <div class="col-md-6">
        <h2><?php echo $reservation_list['check_out'];?></h2>
      </div>
    </div>

    <div class="row mb-3 text-center">
      <div class="col-md-6">
        <h1>Rental name</h1>
      </div>
      <div class="col-md-6">
        <h2><?php echo $reservation_list['rental_name'];?></h2>
      </div>
    </div>

    <div class="row mb-3 text-center">
      <div class="col-md-6">
        <h1>Bbq set</h1>
      </div>
      <div class="col-md-6">
        <h2><?php echo $reservation_list['bbq_set'];?></h2>
      </div>
    </div>

    <div class="row mb-3 text-center">
      <div class="col-md-6">
        <h1>Total fee</h1>
      </div>
      <div class="col-md-6">
        <h2><?php echo $reservation_list['total_fee'];?></h2>
      </div>
    </div>

    <?php
    }
    ?>
</div>
</body>
</html>
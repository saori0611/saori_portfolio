<?php
  require_once "../class/Rental.php";
  session_start();
  $rental = new Rental();

  if(isset($_POST['add_rental'])){
    $rental_name = $_POST['rental_name'];
    $rental_fee = $_POST['rental_fee'];

    $rental->addRental($rental_name, $rental_fee);
  }elseif(isset($_POST['update'])){
    $new_rental_name = $_POST['new_rental_name'];
    $new_rental_fee = $_POST['new_rental_fee'];
    $rental_id = $_POST['rental_id'];

    $rental->updateRentalDetails($new_rental_name, $new_rental_fee, $rental_id);
  }

  
?>
<?php
  require_once "../class/Reservation.php";
  $reservation = new Reservation();

  if(isset($_POST['reservation'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $adult_quantity = $_POST['adult_quantity'];
    $child_quantity = $_POST['child_quantity'];
    $pet_quantity = $_POST['pet_quantity'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $accommodation = $_POST['accommodation'];
    $bbq_set = $_POST['bbq_set'];
    // echo $username;
    // echo $password;
    // echo $adult_quantity;
    // echo $child_quantity;
    // echo $pet_quantity;
    // echo $check_in;
    // echo $check_out;
    // echo $accommodation;
    // echo $bbq_set;
    $reservation->createReservation($username, $password, $adult_quantity, $child_quantity, $pet_quantity, $check_in, $check_out, $accommodation, $bbq_set);
  }
?>
<?php
  require_once "../class/Reservation.php";
  $reservation = new Reservation();

  if(isset($_POST['reservation'])){
    $adult_quantity = $_POST['adult_quantity'];
    $child_quantity = $_POST['child_quantity'];
    $pet_quantity = $_POST['pet_quantity'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $accommodation = $_POST['accommodation'];
    $bbq_set = $_POST['bbq_set'];
    
    $rental_fee = $reservation->getRentalFee($accommodation);

    if(!empty($rental_fee)){
      $total_fee = $rental_fee['rental_fee'] + ($adult_quantity + $child_quantity) * 10;

      $reservation->createReservation($adult_quantity, $child_quantity, $pet_quantity, $check_in, $check_out, $accommodation, $bbq_set, $total_fee);
    }

  }elseif(isset($_POST['update_reservation'])){
    $new_adult_quantity = $_POST['new_adult_quantity'];
    $new_child_quantity = $_POST['new_child_quantity'];
    $new_pet_quantity = $_POST['new_pet_quantity'];
    $new_check_in = $_POST['new_check_in'];
    $new_check_out = $_POST['new_check_out'];
    $new_accommodation = $_POST['new_accommodation'];
    $new_bbq_set = $_POST['new_bbq_set'];
    $reservation_id = $_POST['reservation_id'];

    $reservation->updateReservation($new_adult_quantity, $new_child_quantity, $new_pet_quantity, $new_check_in, $new_check_out, $new_accommodation, $new_bbq_set, $reservation_id);
  }
?>
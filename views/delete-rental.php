<?php
  include "../action/rental-action.php";

  $rental_id = $_GET['rental_id'];

  $rental->deleteRental($rental_id);
?>
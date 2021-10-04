<?php

  include "../action/reservation-action.php";

  $reservation_id = $_GET['reservation_id'];

  $reservation->deleteReservation($reservation_id);

  ?>
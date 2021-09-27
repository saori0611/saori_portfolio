<?php
  require_once 'Database.php';
  session_start();

  class Reservation extends Database{

    public function createReservation($username, $password, $adult_quantity, $child_quantity, $pet_quantity, $check_in, $check_out, $accommodation, $bbq_set){

      $id = $_SESSION['id'];
      $sql = "INSERT INTO reservations (user_id, adult_quantity, child_quantity, pet_quantity, check_in, check_out, rental_id, bbq_set) VALUES('$id', '$adult_quantity', '$child_quantity', '$pet_quantity', '$check_in', '$check_out', '$accommodation', '$bbq_set')";

      if($this->conn->query($sql)){
        header("Location: ../views/index.php");
      }else{
        die("CANNOT ADD INTO RESERVATION: ".$this->conn->error);
      }
    }


  }
?>
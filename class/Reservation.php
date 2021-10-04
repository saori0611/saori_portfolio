<?php
  require_once 'Database.php';
  session_start();

  class Reservation extends Database{

    public function getRentalFee($accommodation){
      $sql = "SELECT rental_fee FROM rental WHERE rental_id = '$accommodation'";

      $result = $this->conn->query($sql);
      if($result){
        return $result->fetch_assoc();
      }else{
        return false;
      }
    }

    public function createReservation($adult_quantity, $child_quantity, $pet_quantity, $check_in, $check_out, $accommodation, $bbq_set, $total_fee){

      $id = $_SESSION['id'];
      $sql = "INSERT INTO reservations (user_id, adult_quantity, child_quantity, pet_quantity, check_in, check_out, rental_id, bbq_set, total_fee) VALUES('$id', '$adult_quantity', '$child_quantity', '$pet_quantity', '$check_in', '$check_out', '$accommodation', '$bbq_set', '$total_fee')";

      if($this->conn->query($sql)){
        header("Location: ../views/reservation.php");
      }else{
        die("CANNOT ADD INTO RESERVATION: ".$this->conn->error);
      }
    }

    public function displayReservations(){

      $id = $_SESSION['user_id'];

      $sql = "SELECT * FROM reservations INNER JOIN rental ON rental.rental_id = reservations.rental_id WHERE user_id = '$id'";

      $result = $this->conn->query($sql);
      $rows = array();

      if($result->num_rows > 0){
        while($reservation_details = $result->fetch_assoc()){
          $rows[] = $reservation_details;
        }
        return $rows;
      }else{
        return false;
      }
    }

    public function displaySpecificReservation($reservation_id){
      $sql = "SELECT * FROM reservations INNER JOIN rental ON rental.rental_id = reservations.rental_id INNER JOIN users ON users.user_id = reservations.user_id INNER JOIN accounts ON accounts.account_id = users.account_id WHERE reservation_id = '$reservation_id'";

      $result = $this->conn->query($sql);

      if($result->num_rows == 1){
        return $result->fetch_assoc();
      }else{
        return false;
      }
    }

    public function updateReservation($new_adult_quantity, $new_child_quantity, $new_pet_quantity, $new_check_in, $new_check_out, $new_accommodation, $new_bbq_set, $reservation_id){
      $sql = "UPDATE reservations
      SET reservations.adult_quantity ='$new_adult_quantity',
          reservations.child_quantity ='$new_child_quantity',
          reservations.pet_quantity ='$new_pet_quantity',
          reservations.check_in ='$new_check_in',
          reservations.check_out ='$new_check_out',
          reservations.rental_id ='$new_accommodation',
          reservations.bbq_set ='$new_bbq_set'
      WHERE reservations.reservation_id = '$reservation_id';
      ";

      if($this->conn->query($sql)){
        header("Location: ../views/reservation.php");
      }else{
        die("CANNOT UPDATE: ".$this->conn->error);
      }
    }

    public function deleteReservation($reservation_id){
      $sql = "DELETE FROM reservations WHERE reservation_id = '$reservation_id'";

      if($this->conn->query($sql)){
        header("Location: ../views/reservation.php");
      }else{
        die("CANNOT DELETE: ".$this->conn->error);
      }
    }

    public function displayAllReservations(){
      $sql = "SELECT * FROM reservations INNER JOIN users ON users.user_id = reservations.user_id INNER JOIN accounts ON accounts.account_id = users.account_id INNER JOIN rental ON rental.rental_id = reservations.rental_id WHERE accounts.status = 'U'";

      $result = $this->conn->query($sql);
      $rows = array();

      if($result->num_rows > 0){
        while($reservation_details = $result->fetch_assoc()){
          $rows[] = $reservation_details;
        }
        return $rows;
      }else{
        return false;
      }
    }

  }
?>
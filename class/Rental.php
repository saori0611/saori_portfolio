<?php
  require_once 'Database.php';

  class Rental extends Database{

    public function addRental($rental_name, $rental_fee){
      $sql = "INSERT INTO rental (rental_name, rental_fee) VALUES('$rental_name', '$rental_fee')";

      if($this->conn->query($sql)){
        header("Location: ../views/rentals.php");
      }else{
        die("CANNOT ADD INTO RENTAL: ".$this->conn->error);
      }
    }

    public function displayRentals(){
      $sql = "SELECT * FROM rental";

      $result = $this->conn->query($sql);
      $rows = array();

      if($result->num_rows > 0){
        while($rental_details = $result->fetch_assoc()){
          $rows[] = $rental_details;
        }
        return $rows;
      }else{
        return false;
      }
    }

    public function displaySpecificRental($rental_id){
      $sql = "SELECT * FROM rental WHERE rental_id = '$rental_id'";

      $result = $this->conn->query($sql);

      if($result->num_rows == 1){
        return $result->fetch_assoc();
      }else{
        return false;
      }
    }

    public function updateRentalDetails($new_rental_name, $new_rental_fee, $rental_id){
      $sql = "UPDATE rental 
      SET rental.rental_name = '$new_rental_name', 
          rental.rental_fee = '$new_rental_fee' 
      WHERE rental.rental_id = '$rental_id';
      ";

      if($this->conn->query($sql)){
        header("Location: ../views/rentals.php");
      }else{
        die("CANNOT UPDATE: ".$this->conn->error);
      }
    }

    public function deleteRental($rental_id){
      $sql = "DELETE FROM rental WHERE rental_id = '$rental_id'";

      if($this->conn->query($sql)){
        header("Location: ../views/rentals.php");
      }else{
        die("CANNOT DELETE: ".$this->conn->error);
      }
    }

  }
?>
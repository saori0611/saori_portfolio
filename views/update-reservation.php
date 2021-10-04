<?php
  include '../action/reservation-action.php';
  $reservation_id = $_GET['reservation_id'];
  $reservation_details = $reservation->displaySpecificReservation($reservation_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update reservation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
  <div class="container">
  <div class="card mx-auto w-50 my-5 border border-0">
      <div class="card-header bg-white border-0 text-primary">
        <h1 class="text-center mt-5">Update reservation</h1>
      </div>

      <div class="card-body">
        <form action="../action/reservation-action.php" method="post">
          
          <div class="row mb-3">
            <div class="col-md-6">
              <input type="number" name="new_adult_quantity" placeholder="Adult quantity" class="form-control" value="<?php echo $reservation_details['adult_quantity']?>" required>
            </div>
            <div class="col-md-6">
              <input type="number" name="new_child_quantity" placeholder="Child quantity" class="form-control"  value="<?php echo $reservation_details['child_quantity']?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <input type="number" name="new_pet_quantity" placeholder="Pet quantity" class="form-control"  value="<?php echo $reservation_details['pet_quantity']?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="check_in">Check in</label>
              <input type="date" name="new_check_in" placeholder="Check in" class="form-control"  value="<?php echo $reservation_details['check_in']?>" required>
            </div>
            <div class="col-md-6">
              <label for="check_out">Check out</label>
              <input type="date" name="new_check_out" placeholder="Check out" class="form-control"  value="<?php echo $reservation_details['check_out']?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-12">
              <?php
                  include '../class/Rental.php';

                  $rental = new Rental();
                  $rows = $rental->displayRentals();
              ?>
              <select name="new_accommodation" id="accommodation" class="form-control"   required>
                <option value="<?php echo $reservation_details['rental_id']?>"><?php echo $reservation_details['rental_name']?></option>
                <?php
                  foreach($rows as $r){
                    echo "<option value='" .$r["rental_id"]. "'>" .$r["rental_name"]. " - " .$r["rental_fee"]. "</option>";
                  }
                ?>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-12">
                <label for="bbq-set" class="">BBQ Set Yes</label>
                <input type="radio" name="new_bbq_set" id="bbq-set" value="bbq-set-yes <?php echo $reservation_details['bbq_set']?>" class="me-3">
                <label for="bbq-set" class="">  BBQ Set No</label>
                <input type="radio" name="new_bbq_set" id="bbq-set" value="bbq-set-no <?php echo $reservation_details['bbq_set']?>">
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <input type="hidden" name="reservation_id" value="<?php echo $reservation_details['reservation_id']?>">
              
              <input type="submit" value="Update reservation" name="update_reservation" class="form-control btn btn-primary">
            </div>
          </div>
        </form>
      </div>
    </div>
  
  </div>
  
</body>
</html>
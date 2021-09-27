<?php
  include '../action/rental-action.php';
  $rental_id = $_GET['rental_id'];
  $rental_details = $rental->displaySpecificRental($rental_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update rental</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="card mx-auto w-50 my-5 border border-0">
      <div class="card-header bg-white text-dark border-0">
        <h2 class="text-center">Update rental</h2>
      </div>

      <div class="card-body">
        <form action="../action/rental-action.php" method="post">
          <div class="row mb-3">
            <div class="col-md-6">
              <input type="text" name="new_rental_name" placeholder="Rental name" class="form-control" value="<?php echo $rental_details['rental_name']?>">
            </div>

            <div class="col-md-6">
              <input type="text" name="new_rental_fee" placeholder="Rental fee" class="form-control" value="<?php echo $rental_details['rental_fee']?>">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-12">

              <input type="hidden" name="rental_id" value="<?php echo $rental_details['rental_id']?>">
              
              <input type="submit" value="update" name="update" class="form-control btn btn-warning">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
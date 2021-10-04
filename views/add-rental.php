<?php
  session_start();

  if($_SESSION['status'] !== 'A'){
    header('Location: ../index.php');
    die;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add rental</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
  <div class="contaner">
    <div class="card mx-auto w-50 my-5 border border-0">
      <div class="card-header bg-white border-0">
        <h1 class="text-center">ADD RENTAL</h1>
      </div>

      <div class="card-body">
        <form action="../action/rental-action.php" method="post">
          <div class="row mb-3">
            <div class="col-md-6">
             <input type="text" name="rental_name" placeholder="Rental name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <input type="text" name="rental_fee" placeholder="Rental fee" class="form-control" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-12">
              <input type="submit" value="Add rental" name="add_rental" class="form-control btn btn-danger">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
</body>
</html>
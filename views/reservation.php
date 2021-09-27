<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RESERVATION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
  <div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
                <a class="bg-dark ps-5 py-1" href="#page-top"><img src="../assets/img/logo.png" alt="..." style="width180px; height:55px;"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse bg-dark pe-5" style="height:63px;" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../index.php ">Home</a></li>
                    </ul>            
            </div>
        </nav>

    <div class="card mx-auto w-50 my-5 border border-0">
      <div class="card-header bg-white border-0 text-primary">
        <h1 class="text-center mt-5">RESERVATION</h1>
      </div>

      <div class="card-body">
        <form action="../action/reservation-action.php" method="post">
          <div class="row mb-3">
            <div class="col-md-6">
              <input type="text" name="username" placeholder="Username" class="form-control" required>
            </div>  
            <div class="col-md-6">
              <input type="password" name="password" placeholder="Password" class="form-control" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <input type="number" name="adult_quantity" placeholder="Adult quantity" class="form-control" required>
            </div>
            <div class="col-md-6">
              <input type="number" name="child_quantity" placeholder="Child quantity" class="form-control" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <input type="number" name="pet_quantity" placeholder="Pet quantity" class="form-control" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="check_in">Check in</label>
              <input type="date" name="check_in" placeholder="Check in" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="check_out">Check out</label>
              <input type="date" name="check_out" placeholder="Check out" class="form-control" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-12">
              <?php
                  include '../class/Rental.php';

                  $rental = new Rental();
                  $rows = $rental->displayRentals();
              ?>
              <select name="accommodation" id="accommodation" class="form-control" required>
                <option value="" hidden>Accommodation</option>
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
                <input type="radio" name="bbq_set" id="bbq-set" value="bbq-set-yes" class="me-3">
                <label for="bbq-set" class="">  BBQ Set No</label>
                <input type="radio" name="bbq_set" id="bbq-set" value="bbq-set-no">
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <input type="submit" value="Reservation" name="reservation" class="form-control btn btn-primary">
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</body>
</html>
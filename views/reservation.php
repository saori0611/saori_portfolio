<?php
  include "../action/reservation-action.php";
  $reservation_list = $reservation->displayReservations();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
　<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
                <a class="ps-5 py-1" href="#page-top"><img src="../assets/img/logo.png" alt="..." style="width180px; height:55px;"/></a>
                <div class="collapse navbar-collapse bg-dark pe-5" style="height:63px;" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../index.php ">Home</a></li>
                    </ul>            
            </div>
        </nav>
    
  <div class="container mt-5">
    <a href="add-reservation.php" class="btn btn-success mt-3 ">ADD RESERVATION</a>
    <h1 class="text-center mt-2">Reservation</h1>
    <table class="table mx-auto my-3">
      <thead class="table-success">
        <tr>
          <th>Adult quantity</th>
          <th>Child quantity</th>
          <th>Pet quantity</th>
          <th>Check in</th>
          <th>Check out</th>
          <th>Accommodation</th>
          <th>BBQ Set</th>
          <th>Total fee</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <?php
          if($reservation_list == false){
        ?>
          <tr>
            <td colspan="8" class="text-danger">NO RECORDS FOUND</td>
          </tr>
        <?php
        }else{
          foreach($reservation_list as $reservation){
        ?>

          <tr>
            <th><?php echo $reservation['adult_quantity'];?></th>
            <th><?php echo $reservation['child_quantity'];?></th>
            <th><?php echo $reservation['pet_quantity'];?></th>
            <th><?php echo $reservation['check_in'];?></th>
            <th><?php echo $reservation['check_out'];?></th>
            <th><?php echo $reservation['rental_name'];?></th>
            <th><?php echo $reservation['bbq_set'];?></th> 
            <th><?php echo $reservation['total_fee'];?></th>
            <th>
            <a href="view-reservation.php?reservation_id=<?php echo $reservation['reservation_id'];?>" class="btn btn-success">VIEW</a>
            </th>
            <th>
            <a href="update-reservation.php?reservation_id=<?php echo $reservation['reservation_id'];?>" class="btn btn-primary">UPDATE</a>
            </th>
            <th>
            <a href="delete-reservation.php?reservation_id=<?php echo $reservation['reservation_id'];?>" class="btn btn-danger">DELETE</a>
            </th>
          </tr>
          <?php
          }
        }
          ?>
      </tbody>
    </table>
  </div>
</body>
</html>
<?php
  include "../action/reservation-action.php";

  if($_SESSION['status'] !=='A'){
    header('Location: ../index.php');
    die;
  }
  $reservation_list = $reservation->displayAllReservations();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin reservation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>


  <div class="container">
    <a href="admin.php" class="btn btn-info text-white mt-3">Back</a>
    <div class="container text-center">
      <h1>Reservation list</h1>
    </div>
    <table class="table mx-auto my-3">
      <thead class="table-success">
        <tr>
          <th>Reservation id</th>
          <th>User name</th>
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
              <td><?php echo $reservation['reservation_id'];?></td>
              <td><?php echo $reservation['first_name']."".$reservation['last_name'];?></td>
              <td><?php echo $reservation['adult_quantity'];?></td>
              <td><?php echo $reservation['child_quantity'];?></td>
              <td><?php echo $reservation['pet_quantity'];?></td>
              <td><?php echo $reservation['check_in'];?></td>
              <td><?php echo $reservation['check_out'];?></td>
              <td><?php echo $reservation['rental_name'];?></td>
              <td><?php echo $reservation['bbq_set'];?></td>
              <td><?php echo $reservation['total_fee'];?></td>
              <td>
              <a href="update-reservation.php?reservation_id=<?php echo $reservation['reservation_id'];?>" class="btn btn-primary">UPDATE</a>
              </td>
              <td>
              <a href="delete-reservation.php?reservation_id=<?php echo $reservation['reservation_id'];?>" class="btn btn-danger">DELETE</a>
              </td>  
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
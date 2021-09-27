<?php
 include "../action/rental-action.php";
 $rental_list = $rental->displayRentals();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rentals</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <a href="admin.php" class="btn btn-info text-white mt-3">Back</a>
    <h1 class="text-center">Rentals</h1>
    <a href="add-rental.php" class="btn btn-success">ADD RENTALS</a>
    <table class="table table-hover table-striped table-borderless mx-auto my-3">
      <thead class="table-info">
        <tr>
          <th>Rental name</th>
          <th>Rental fee</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <?php
          if($rental_list == false){
        ?>
           <tr>
            <td colspan="8" class="text-danger">NO RECORDS FOUND</td>
           </tr> 
        <?php
         }else{
           foreach($rental_list as $rental){
        ?>
         
            <tr>
              <th><?php echo $rental['rental_name'];?></th>
              <th><?php echo $rental['rental_fee'];?></th>
              <th>
              <a href="update-rental.php?rental_id=<?php echo $rental['rental_id'];?>" class="btn btn-primary">UPDATE</a>
              <a href="delete-rental.php?rental_id=<?php echo $rental['rental_id'];?>" class="btn btn-danger">DELETE</a>
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
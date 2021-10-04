<?php
  include "../action/user-action.php";

  if($_SESSION['status'] !== 'A'){
    header('Location: ../index.php');
    die;
  }
  $user_list = $user->displayUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <a href="admin.php" class="btn btn-info text-white mt-3">Back</a>
    <h1 class="text-center">Users</h1>
    <a href="add-user.php" class="btn btn-success">ADD USERS</a>
    <table class="table table-hover table-striped table-borderless mx-auto my-3">
      <thead class="table-warning">
        <tr>
          <th>First name</th>
          <th>Last name</th>
          <th>Gender</th>
          <th>Address</th>
          <th>Email address</th>
          <th>Contact number</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <?php
          if($user_list == false){
        ?>
          <tr>
            <td colspan="8" class="text-danger">NO RECORDS FOUND</td>
          </tr>
        <?php
          }else{
            foreach($user_list as $user){
        ?>

          <tr>
              <th><?php echo $user['first_name'];?></th>
              <th><?php echo $user['last_name'];?></th>
              <th><?php echo $user['gender'];?></th>
              <th><?php echo $user['address'];?></th>
              <th><?php echo $user['email_address'];?></th>
              <th><?php echo $user['contact_number'];?></th>
              <th>
              <a href="update-user.php?user_id=<?php echo $user['user_id'];?>" class="btn btn-primary">UPDATE</a>
              <a href="delete-user.php?user_id=<?php echo $user['user_id'];?>" class="btn btn-danger">DELETE</a>
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
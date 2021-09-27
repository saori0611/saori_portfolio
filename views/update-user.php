<?php
  include '../action/user-action.php';
  $user_id = $_GET['user_id'];
  $user_details = $user->displaySpecificUser($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update user</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="card mx-auto w-50 my-5 border border-0">
      <h2 class="text-center">Update user</h2>
    </div>

    <div class="card-body">
      <form action="../action/user-action.php" method="post">
        <div class="row mb-3">
          <div class="col-md-6">
            <input type="text" name="new_first_name" placeholder="First name" class="form-control" value="<?php echo $user_details['first_name']?>">
          </div>

          <div class="col-md-6">
            <input type="text" name="new_last_name" placeholder="Last name" class="form-control" value="<?php echo $user_details['last_name']?>">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <input type="radio" name="new_gender" id="gender" value="male <?php echo $user_details['gender']?>">
            <label for="gender">male</label>
            <input type="radio" name="new_gender" id="gender" value="female <?php echo $user_details['gender']?>">
            <label for="gender">female</label>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <input type="text" name="new_address" placeholder="Address" class="form-control" value="<?php echo $user_details['address']?>">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <input type="text" name="new_email_address" placeholder="Email address" class="form-control" value="<?php echo $user_details['email_address']?>">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <input type="text" name="new_contact_number" placeholder="Contact number" class="form-control" value="<?php echo $user_details['contact_number']?>">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <input type="text" name="new_username" placeholder="Username" class="form-control" value="<?php echo $user_details['username']?>">
          </div>

          <div class="col-md-6">
            <input type="password" name="new_password" placeholder="Password" class="form-control">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <input type="hidden" name="old_password" value="<?php echo $user_details['password']?>">
            
            <input type="hidden" name="user_id" value="<?php echo $user_details['user_id']?>">

            <input type="submit" value="update" name="update_user" class="form-control btn btn-warning">
          </div>
        </div>
      </form>
    </div>
  </div>
  
</body>
</html>
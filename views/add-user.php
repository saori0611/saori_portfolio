<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add user</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="card mx-auto w-50 my-5 border border-0">
      <div class="card-header bg-white border-0">
        <h1 class="text-center">ADD USER</h1>
      </div>

      <div class="card-body">
        <form action="../action/user-action.php" method="post">
          <div class="row mb-3">
            <div class="col-md-6">
              <input type="text" name="first_name" placeholder="First name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <input type="text" name="last_name" placeholder="Last name" class="form-control" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <input type="radio" name="gender" id="gender" value="male">
              <label for="gender">male</label>
              <input type="radio" name="gender" id="gender" value="female">
              <label for="gender">female</label>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-12">
              <input type="text" name="address" placeholder="Address" class="form-control" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-12">
              <input type="text" name="email_address" placeholder="Email address" class="form-control" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-12">
             <input type="text" name="contact_number" placeholder="Contact number" class="form-control" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <input type="text" name="username" placeholder="Username" class="form-control" required>
            </div>  
            <div class="col-md-6">
              <input type="password" name="password" placeholder="Password" class="form-control" required>
            </div>
          </div>

          <div class="row-mb-3">
            <div class="col-md-12">
              <input type="submit" value="Add user" name="register" class="form-control btn btn-danger">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
</body>
</html>
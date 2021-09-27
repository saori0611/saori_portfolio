<?php
    require_once 'Database.php';

    class User extends Database{
     
      public function createAccount($username,$password){
        $sql = "INSERT INTO accounts(username, password) VALUES('$username', '$password')";
        
        if($this->conn->query($sql) == false){
          die("CANNOT ADD INTO ACCOUNTS: ".$this->conn->error);
        }else{
          return true;
        }
      }

      public function createUser($first_name, $last_name, $gender, $address, $email_address, $contact_number){
        $user_account_id = $this->conn->insert_id;

        $sql =  "INSERT INTO users(first_name, last_name, gender, address, email_address, contact_number, account_id) VALUES('$first_name', '$last_name', '$gender', '$address', '$email_address', '$contact_number', '$user_account_id')";

        if($this->conn->query($sql)){
          header("Location: ../views/login.php");
        }else{
          die("CANNOT ADD INTO USER: ".$this->conn->error);
        }
      }

      public function login($username, $password){
        $sql = "SELECT * FROM users INNER JOIN accounts ON accounts.account_id = users.account_id WHERE username = '$username'";


        $result = $this->conn->query($sql);

        if($result->num_rows == 1){
          $row = $result->fetch_assoc();

          if(password_verify($password, $row['password'])){
            $_SESSION['username'] = $row['username'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['id'] = $row['account_id'];

            if($row['status']=='A'){
              header("Location: ../views/admin.php");
            }elseif($row['status']=='U'){
              header("Location: ../index.php");
            }
          }else{
            echo "Invalid Password";
          }
        }else{
          echo "Invalid Username";
        }
      }

      public function displayUsers(){
        $sql = "SELECT * FROM users";

        $result = $this->conn->query($sql);
        $rows = array();

        if($result->num_rows > 0){
          while($user_details = $result->fetch_assoc()){
            $rows[] = $user_details;
          }return $rows;
        }else{
          return false;
        }
      }

      public function displaySpecificUser($user_id){
        $sql = "SELECT * FROM users INNER JOIN accounts ON users.account_id = accounts.account_id WHERE users.user_id = '$user_id'";

        $result = $this->conn->query($sql);

        if($result->num_rows == 1){
          return $result->fetch_assoc();
        }else{
          return false;
        }
      }

      public function updateUserDetails($new_first_name, $new_last_name, $new_gender, $new_address, $new_email_address, $new_contact_number, $new_username, $password, $user_id){
        $sql = "UPDATE users INNER JOIN accounts ON accounts.account_id = users.account_id
        SET users.first_name = '$new_first_name',
            users.last_name = '$new_last_name',
            users.gender = '$new_gender',
            users.address = '$new_address',
            users.email_address = '$new_email_address',
            users.contact_number = '$new_contact_number',

            accounts.username = '$new_username',
            accounts.password = '$password'
        WHERE users.user_id = '$user_id';
        ";

      if($this->conn->query($sql)){
        header("Location: ../views/users.php");
      }else{
        die("CANNOT UPDATE: ".$this->conn->error);
      }
      }

      public function deleteUser($user_id){
        $sql = "DELETE users, accounts FROM users INNER JOIN accounts ON accounts.account_id = users.account_id WHERE users.user_id = '$user_id'";

        if($this->conn->query($sql)){
          header("Location: ../views/users.php");
        }else{
          die("CANNOT DELETE: ".$this->conn->error);
        }
      }

  }
?>
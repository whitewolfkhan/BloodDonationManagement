<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    body {
      background: url('bm.jpg') no-repeat center center fixed;
      background-size: cover;
      font-family: Arial, sans-serif;
    }
    .card {
      background: rgba(255, 255, 255, 0.8); /* Transparent background for better readability */
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .form-control {
      border-radius: 10px;
    }
    .btn-primary {
      border-radius: 20px;
    }
    .alert {
      margin-top: 15px;
    }
  </style>
</head>
<body>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container" style="margin-top:200px;">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <h1 class="mt-4 mb-3" style="color:#D2F015;">
            Blood Donation Management
            <br>Admin Login Portal
          </h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card p-4">
            <div class="card-body">
              <div class="mb-3">
                <label for="username" class="font-italic font-weight-bold">Username<span style="color:red">*</span></label>
                <input type="text" id="username" name="username" placeholder="Enter your username" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="password" class="font-italic font-weight-bold">Password<span style="color:red">*</span></label>
                <input type="password" id="password" name="password" placeholder="Enter your Password" class="form-control" required>
              </div>
              <div class="text-center">
                <input type="submit" name="login" class="btn btn-primary" value="LOGIN">
              </div>
              <?php
                include 'conn.php';

                if (isset($_POST["login"])) {
                  $username = mysqli_real_escape_string($conn, $_POST["username"]);
                  $password = mysqli_real_escape_string($conn, $_POST["password"]);

                  $sql = "SELECT * FROM admin_info WHERE admin_username='$username' AND admin_password='$password'";
                  $result = mysqli_query($conn, $sql) or die("Query failed.");

                  if (mysqli_num_rows($result) > 0) {
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION["username"] = $username;
                    header("Location: dashboard.php");
                  } else {
                    echo '<div class="alert alert-danger font-weight-bold">Username and Password are not matched!</div>';
                  }
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</body>
</html>

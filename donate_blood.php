<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Donate Blood</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    /* General Page Styling */
    body {
      background: linear-gradient(to right, #f8f9fa, #e9ecef);
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      color: #343a40;
    }

    h1 {
      color: #007bff;
      font-weight: bold;
    }

    .container {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      padding: 30px;
      margin-top: 30px;
    }

    .form-control {
      border: 1px solid #ced4da;
      border-radius: 8px;
    }

    .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
    }

    label {
      font-weight: bold;
      margin-bottom: 5px;
      display: block;
      color: #495057;
    }

    textarea {
      resize: none;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 8px;
      padding: 10px 20px;
      font-size: 16px;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      transition: 0.3s;
    }

    .font-italic {
      font-style: italic;
      margin-bottom: 10px;
      color: #6c757d;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .row .col-lg-4 {
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>
<?php
$active = 'donate';
include('head.php');
?>

<div id="page-container" style="margin-top:50px; position: relative; min-height: 84vh;">
  <div class="container">
    <div id="content-wrap" style="padding-bottom:50px;">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="mt-4 mb-3 text-center">Donate Blood</h1>
        </div>
      </div>
      <form name="donor" action="savedata.php" method="post">
        <div class="row">
          <div class="col-lg-4 mb-4">
            <label for="fullname">Full Name<span style="color:red">*</span></label>
            <input type="text" id="fullname" name="fullname" class="form-control" required>
          </div>
          <div class="col-lg-4 mb-4">
            <label for="mobileno">Mobile Number<span style="color:red">*</span></label>
            <input type="text" id="mobileno" name="mobileno" class="form-control" required>
          </div>
          <div class="col-lg-4 mb-4">
            <label for="emailid">Email Id</label>
            <input type="email" id="emailid" name="emailid" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4">
            <label for="age">Age<span style="color:red">*</span></label>
            <input type="text" id="age" name="age" class="form-control" required>
          </div>
          <div class="col-lg-4 mb-4">
            <label for="gender">Gender<span style="color:red">*</span></label>
            <select id="gender" name="gender" class="form-control" required>
              <option value="" selected disabled>Select</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="col-lg-4 mb-4">
            <label for="blood">Blood Group<span style="color:red">*</span></label>
            <select id="blood" name="blood" class="form-control" required>
              <option value="" selected disabled>Select</option>
              <?php
              include 'conn.php';
              $sql = "SELECT * FROM blood";
              $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <option value="<?php echo $row['blood_id']; ?>"><?php echo $row['blood_group']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 mb-4">
            <label for="address">Address<span style="color:red">*</span></label>
            <textarea id="address" class="form-control" name="address" rows="4" required></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 text-center">
            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php include('footer.php'); ?>
</div>
</body>
</html>

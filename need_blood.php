<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Need Blood</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    /* General Page Styling */
    body {
      background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      color: #343a40;
    }

    h1 {
      color: #007bff;
      font-weight: bold;
    }

    .container {
      background: #ffffff;
      border-radius: 10px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }

    .form-control {
      border-radius: 8px;
      border: 1px solid #ced4da;
    }

    .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 8px;
      padding: 10px 20px;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      transition: 0.3s;
    }

    .card {
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
      border-radius: 10px 10px 0 0;
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
  $active = 'need';
  include('head.php');
  ?>

  <div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
    <div class="container">
      <div id="content-wrap" style="padding-bottom:50px;">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h1 class="mt-4 mb-3">Need Blood</h1>
          </div>
        </div>
        <form name="needblood" action="" method="post">
          <div class="row">
            <div class="col-lg-4 mb-4">
              <label for="blood" class="font-weight-bold">Blood Group<span style="color:red">*</span></label>
              <select name="blood" id="blood" class="form-control" required>
                <option value="" selected disabled>Select</option>
                <?php
                include 'conn.php';
                $sql = "select * from blood";
                $result = mysqli_query($conn, $sql) or die("query unsuccessful.");
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <option value="<?php echo $row['blood_id'] ?>"><?php echo $row['blood_group'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-lg-8 mb-4">
              <label for="reason" class="font-weight-bold">Reason, why do you need blood?<span style="color:red">*</span></label>
              <textarea class="form-control" id="reason" name="address" rows="4" required></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 mb-4">
              <input type="submit" name="search" class="btn btn-primary" value="Search" style="cursor:pointer">
            </div>
          </div>
        </form>
        <div class="row">
          <?php
          if (isset($_POST['search'])) {

            $bg = $_POST['blood'];
            $sql = "select * from donor_details join blood where donor_details.donor_blood=blood.blood_id AND donor_blood='{$bg}' order by rand() limit 5";
            $result = mysqli_query($conn, $sql) or die("query unsuccessful.");
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
          ?>
                <div class="col-lg-4 col-sm-6 portfolio-item"><br>
                  <div class="card" style="width:100%">
                    <img class="card-img-top" src="image/blood_drop_logo.jpg" alt="Card image">
                    <div class="card-body">
                      <h3 class="card-title"><?php echo $row['donor_name']; ?></h3>
                      <p class="card-text">
                        <b>Blood Group:</b> <?php echo $row['blood_group']; ?><br>
                        <b>Mobile No.:</b> <?php echo $row['donor_number']; ?><br>
                        <b>Gender:</b> <?php echo $row['donor_gender']; ?><br>
                        <b>Age:</b> <?php echo $row['donor_age']; ?><br>
                        <b>Address:</b> <?php echo $row['donor_address']; ?><br>
                      </p>
                    </div>
                  </div>
                </div>
          <?php
              }
            } else {
              echo '<div class="alert alert-danger col-12">No Donor Found For Your Search Blood Group</div>';
            }
          }
          ?>
        </div>
      </div>
    </div>
    <?php include('footer.php') ?>
  </div>
</body>

</html>

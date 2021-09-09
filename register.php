<?php
session_start();
include('server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Register Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      background-color: papayawhip;
      border-color: papayawhip;
    }

    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }



    .button {
      border: none;
      color: black;
      padding: 11.75px 29px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 10px;
      margin-right: 21px;
      cursor: pointer;
      background-color: #FFD966;
    }

    body {
      background-image: url('Photo/moon.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100%;
    }

    .wrapper {
      padding: 20px;
      font-weight: bold;
      background-size: cover;
      text-align: center;
      background-color: rgba(192, 192, 192, 0.3);
      background-size: auto;
    }
  </style>
</head>

<body>


  <form action="register_db.php" method="post">
    <?php include('errors.php'); ?>

    <?php if (isset($_SESSION['error'])) : ?>
      <div class="error">
        <h3>
          <?php
          echo $_SESSION['error'];
          unset($_SESSION['error']);
          ?>
        </h3>
      </div>
    <?php endif ?>
    <div class="input-group">
      <div class="container">
        <div class="row">
          <div col-12>
            <div class="wrapper" style="font-size:10px; font-family: 'Lobster', cursive;">
              <h2 class=" blockquote " style="font-size:30px; font-family: 'Lobster', cursive;"><strong>Register<strong></h2>
              <p>Please fill this form.</p>
              <form>
                <div style="font-size:15px;  text-align: left; font-family: 'Lobster', cursive;">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" placeholder="User Name" style="font-size:15px">
                  <span class="help-block"></span><br><br>
                </div>
                <div style="font-size:15px; text-align: left; font-family: 'Lobster', cursive;">
                  <label for="password_1">Password</label>
                  <input type="password" name="password_1" class="form-control" placeholder="Password" style="font-size:15px">
                  <span class="help-block"></span><br><br>
                </div>
                <div style="font-size:15px; text-align: left; font-family: 'Lobster', cursive;">
                  <label for="password_2">Confirm Password</label>
                  <input type="password" name="password_2" class="form-control" placeholder="Confirm Password" style="font-size:15px">
                  <span class="help-block"></span><br><br>
                </div>

                <div class="form-group" style="font-size:15px; text-align: left; font-family: 'Lobster', cursive;">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Full Name" value="" maxlength="50" required="" style="font-size:15px">
                </div><br><br>
                <div class="form-group" style="font-size:15px; text-align: left; font-family: 'Lobster', cursive;">
                  <label for="lastname">Lastname</label>
                  <input type="text" name="lastname" class="form-control" placeholder="Full Name" value="" maxlength="50" required="" style="font-size:15px">
                </div><br><br>
                <div class="form-group" style="font-size:15px;  text-align: left; font-family: 'Lobster', cursive;">
                  <label for="address">Address</label>
                  <input type="address" name="address" class="form-control" placeholder="Address" value="" maxlength="12" required="" style="font-size:15px">
                </div><br><br>
                <div class="form-group" style="font-size:15px;  text-align: left; font-family: 'Lobster', cursive;">
                  <label for="telephone">Telephone</label>
                  <input type="tel" name="tel" class="form-control" placeholder="Telephone" value="" maxlength="12" required="" style="font-size:15px">
                </div><br><br>
                <div class="form-group " style="font-size:15px;  text-align: left; font-family: 'Lobster', cursive;">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email" value="" maxlength="30" required="" style="font-size:15px">
                </div><br><br>

                <div class="form-group" style="font-size:15px; font-family: 'Lobster', cursive;">
                  <button type="submit"  name="reg_user" class="btn">Submit</button>
                  <button type="reset" name="reset" class="btn" value="Reset">Reset</button>
                </div>
                <p>Already a member? <a href="login.php">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form><br><br><br><br>






  <footer class="container-fluid text-center">
    <p>Footer Text</p>
  </footer>



</body>

</html>
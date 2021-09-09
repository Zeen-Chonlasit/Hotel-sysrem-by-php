<?php
session_start();
include('server.php');

if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header('location: login.php');
}

$username = $_SESSION['username'];


$errors = array();
// echo $_POST['booking'];
if (isset($_POST['booking'])) {
  
    $save_user = "SELECT * FROM customer WHERE username = '$username' ";

    $result = mysqli_fetch_assoc(mysqli_query($conn, $save_user));
    $userid = $result['userId'];
    $roomid = $_POST['roomId'];
    $check_in = $_POST['date_check_in'];
    $check_out = $_POST['date_check_out'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    echo $userid;
    echo $roomid;
    echo $check_in;
    echo $check_out;
    echo $adults;
    echo $children;
echo $username;
    if (empty($check_in)) {
        array_push($errors, "Check in date is required");
    }
    if (empty($check_out)) {
        array_push($errors, "Check out date is required");
    }
    if (empty($adults)) {
        array_push($errors, "Adults is required");
    }
    if (empty($roomid)) {
        array_push($errors, "Room number is required");
    }

    $start_date = $check_in;
    $end_date = $check_out;

    $datetime1 = new DateTime($start_date);
    $datetime2 = new DateTime($end_date);
    $interval = $datetime1->diff($datetime2);
    $num_day = $interval->format('%a');
    $diff = $num_day;
    $total = 0;

    echo $roomid;

    if ($roomid == 1) {
        $total = $diff * 4000;
    } 
    if ($roomid == 2) {
        $total = $diff * 4000;
    } 
    if ($roomid == 3) {
        $total = $diff * 2000;
    } 
    if ($roomid == 4) {
        $total = $diff * 2000;
    } 
    if ($roomid == 5) {
        $total = $diff * 1000;
    } 
    if ($roomid == 6) {
        $total = $diff * 1000;
    } 
    if (count($errors) == 0) {

        $sql = "INSERT INTO booking (userId, roomId, total,  date_check_in, date_check_out, adults, children) VALUES ('$userid', '$roomid', '$total', '$check_in', '$check_out', '$adults', '$children')";
        mysqli_query($conn, $sql);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header("location: receipt.php?user=$username&dti=$check_in");
    } else {
        array_push($errors, "");
        $_SESSION['error'] = "";
        header("location: home.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>ZAMMO HOTEL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script@import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');>
    </script>
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
      color:black;
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


  </style>
</head>
<body style="background-color: #CCECFF;">


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="home.php" style="font-family: 'Lobster', cursive;">HOME</a></li>
        <li><a href="Accommodations.php" style="font-family: 'Lobster', cursive;">ACCOMMODATIONS</a></li>
        <li class="active"><a href="Facilities.php" style="font-family: 'Lobster', cursive;">FACILITIES</a></li>
        <li><a href="Gallery.php" style="font-family: 'Lobster', cursive;">GALLERY</a></li>
        <li><a href="ContactUs.php" style="font-family: 'Lobster', cursive;">CONTACT US</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right" style="font-family: 'Lobster', cursive;">
            <?php if (isset($_SESSION['username'])) : ?>
              <p style="font-family: 'Lobster', cursive;">user : <strong><?php echo $_SESSION['username']; ?></strong>
                <a href="#"><span class="glyphicon glyphicon-log-in"></span>
                  <a href="home.php?logout='1'" style="color: red;">Logout</a>
              </p>
            <?php endif ?>
            </a>
          </ul>
    </div>
  </div>
</nav>

<div>
  <div class="container text-center">
    <div class="row-no-gutters">
      <br><br>
      <h3 style="font-family: 'Lobster', cursive;">SWIMMING POOL</h3><br><br>

      <img
        src="Photo\pool.jpg"
        class="img-responsive"
        style="width: 100%"
        alt="Image"
      ><br><br>

      <h3 style="font-family: 'Lobster', cursive;">SERVICE</h3><br><br>

      <img
        src="Photo\service.jpg"
        class="img-responsive"
        style="width: 100%"
        alt="Image"
      ><br><br>

      <h3 style="font-family: 'Lobster', cursive;">FOOD</h3><br><br>

      <img
        src="Photo\food.jpg"
        class="img-responsive"
        style="width: 100%"
        alt="Image"
      ><br><br>

      <h3 style="font-family: 'Lobster', cursive;">GYM & FITNESS</h3><br><br>

      <img
        src="Photo\gym.jpg"
        class="img-responsive"
        style="width: 100%"
        alt="Image"
      ><br><br>

    </div>
  </div>
</div>






<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>
  


</body>
</html>

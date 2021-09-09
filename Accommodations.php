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

        $_SESSION['date_check_in'] = $check_in;
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
  <script@import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');></script>
  <script@import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');>
    </script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      background-color: black;
      border-color: black;
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

<form method="post"> 
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
        <li><a href="home.php" style="font-family: 'Lobster', cursive; ">Home</a></li>
        <li class="active"><a href="Accommodations.html" style="font-family: 'Lobster', cursive;">ACCOMMODATIONS</a></li>
        <li><a href="Facilities.php" style="font-family: 'Lobster', cursive;">FACILITIES</a></li>
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

<div class="container-fluid">
    <br><br>
    <div class="col-sm-2">
    <h1 style="font-family: 'Lobster', cursive;">ACCOMMODATIONS</h1>
    </div>
</div>

<div class="container text-center">
        <br><br><br><br>
        <div class="row-no-gutters">

          <div class="col-sm-4" class="left" style="background-color: #0082D2; padding-top: 50px; padding-bottom: 50px; font-family: 'Lobster', cursive;">
            <h1> ONLINE </h1><br>
            <h1> RESERVATION </h1>
          </div>
          <div>
            <div class="col-sm-2" style="background-color: #93D6FF; font-size: 15px; font-family: 'Lobster', cursive;">
              <br><br>
              <p> CHECK–IN DATE </p>
            </div>
            <div class="col-sm-2" style="background-color: #93D6FF; font-size: 15px; font-family: 'Lobster', cursive;">
              <br><br>
              <p> CHECK–OUT DATE </p>
            </div>
            <div class="col-sm-2" style="background-color: #93D6FF; font-size: 15px; font-family: 'Lobster', cursive;">
              <br><br>
              <p> ADULTS </p>
            </div>
            <div class="col-sm-2" style="background-color: #93D6FF; font-size: 15px; font-family: 'Lobster', cursive;">
              <br><br>
              <p> CHILDREN </p>
            </div>

          </div>

          <div class="col-sm-2" style="background-color: #93D6FF; font-size: 12px; font-family: 'Lobster', cursive;">
            <input type="date" name="date_check_in">
          </div>
          <div class="col-sm-2" style="background-color: #93D6FF; font-size: 12px; font-family: 'Lobster', cursive;">
            <input type="date" name="date_check_out">
          </div>
          <div class="col-sm-2" style="background-color: #93D6FF; font-size: 13px; font-family: 'Lobster', cursive;">
            <input type="text" name="adults" style="font-size: 12px;">
          </div>
          <div class="col-sm-2" style="background-color: #93D6FF; font-size: 13px; font-family: 'Lobster', cursive;">
            <input type="text" name="children" style="font-size: 12px;">
          </div>


          <div class="col-sm-2" style="background-color: #93d6ff; font-size: 15px; font-family: 'Lobster', cursive;">
            <br><br>
            <p> ROOM NUMBER </p>
          </div>
          <div class="text-right">
            <div class="col-sm-6" style="background-color: #93d6ff; font-size: 15px; padding-right: 85px; font-family: 'Lobster', cursive;">
              <br><br>
              <p>😀</p>
            </div>
          </div>
          <div class="col-sm-2" style="background-color: #93d6ff; font-family: 'Lobster', cursive; font-size: 14.7px;">
            <input type="number" name="roomId" min="1" max="6" placeholder="Select room number between 1 and 6">
            <br><br><br><br>
          </div>
          <div class="text-right">
            <div class="col-sm-6" style="background-color: #93d6ff; font-size: 22px; font-family: 'Lobster', cursive; font-size: 17px;">
              <button type="submit" class="button button1" name="booking">BOOK NOW</button>
            </div>
          </div>

          <div class="col-sm-6" style="background-color: #93d6ff; font-size: 15px; font-family: 'Lobster', cursive;">
            <br>
          </div>

        </div>
      </div>
    </div>

  <div class="container text-center">
    <div class="row-no-gutters" >
      <div class="col-sm-6" class="left" style="background-color: #93d6ff; padding-top: 50px; padding-bottom: 50px; ">
        <div>
          <a href='1.LuxuryRoomKing.php' class="button button1" style=" font-family: 'Lobster', cursive; background-color: #E7F6FF;" type="button"><h3>1) Luxury Room - King</h3></a>
        </div>
      </div>

      <div class="col-sm-6" class="left" style="background-color: #93d6ff;padding-top: 50px; padding-bottom: 50px;  ">
        <div>
          <a href='2.LuxuryRoomTwin.php' class="button button1" style="font-family: 'Lobster', cursive; background-color: #E7F6FF;" type="button" ><h3>2) Luxury Room - Twin</h3></a>
        </div>
      </div>

      <div class="col-sm-6" class="left" style="background-color: #93d6ff;padding-top: 50px; padding-bottom: 50px;  ">
        <div>
          <a href='3.SuperiorRoomKing.php' class="button button1" style="font-family: 'Lobster', cursive; background-color: #E7F6FF;" type="button" ><h3>3) Superior Room - King</h3></a>
        </div>
      </div>

      <div class="col-sm-6" class="left" style="background-color: #93d6ff;padding-top: 50px; padding-bottom: 50px;  ">
        <div>
          <a href="4.SuperiorRoomTwin.php" class="button button1" style="font-family: 'Lobster', cursive; background-color: #E7F6FF;" type="button" ><h3>4) Superior Room - Twin</h3></a>
        </div>
      </div>

      <div class="col-sm-6" class="left" style="background-color: #93d6ff;padding-top: 50px; padding-bottom: 50px;  ">
        <div>
          <a href="5.StandardRoomKing.php" class="button button1" style="font-family: 'Lobster', cursive; background-color: #E7F6FF;" type="button" ><h3>5) Standard Room - King</h3></a>
        </div>
      </div>

      <div class="col-sm-6" class="left" style="background-color: #93d6ff;padding-top: 50px; padding-bottom: 50px;  ">
        <div>
          <a href="6.StandardRoomTwin.php" class="button button1" style="font-family: 'Lobster', cursive; background-color: #E7F6FF;" type="button" ><h3>6) Standard Room - Twin</h3></a>
        </div>
      </div>


    </div>
  </div>



<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>
  

</form>
</body>
</html>

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

$user = $_SESSION['username'];
$dti = $_SESSION['date_check_in'];
$data =   "SELECT * 
          FROM customer
          INNER JOIN booking
          ON customer.userId = booking.userId
          INNER JOIN room
          ON booking.roomId = room.roomId WHERE username = '$user' AND date_check_in = '$dti' ";
$query = mysqli_query($conn, $data);
$res = mysqli_fetch_assoc($query)
//ทดสอบ


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZAMMO HOTEL</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
</head>

<body>


  <form>
    <nav class=" navbar navbar-inverse">
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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">ACCOMMODATIONS</a></li>
            <li><a href="#">FACILITIES</a></li>
            <li><a href="#">GALLERY</a></li>
            <li><a href="#">CONTACT US</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="Photo\1.jpg" alt="Image" />
            <div class="carousel-caption"></div>
          </div>

          <div class="item">
            <img src="Photo\2.jpg" alt="Image" />
            <div class="carousel-caption"></div>
          </div>
        </div>
      </div>
      <br /><br /><br /><br />

      <h2 class="col-sm-12" style="text-align: center;">ใบเสร็จ</h2>

      <table class="container">
        <tr>
        </tr>
        <tr>
          <th class="col-sm-12" style="text-align: center;">ชื่อและที่อยู่ของ คุณ <?php echo $res['username']; ?></th>
        </tr>
        <tr>
          <th style="">ชื่อ : <?php echo $res['name']; ?> &nbsp;&nbsp; <?php echo $res['lastname']; ?></th>
        </tr>
        <tr>
          <th>ที่อยู่ : <?php echo $res['address']; ?></th>
        </tr>
        <tr>
          <th>อีเมล : <?php echo $res['email']; ?></th>
        </tr>

      </table>

      <table class="container">

        <h2 class="col-sm-12" style="text-align: center;">รายละเอียด</h2>
        <tr>
          <th>วันที่เข้าพัก : <?php echo $res['date_check_in']; ?></th>
        </tr>
        <tr>
          <th>วันที่ออก : <?php echo $res['date_check_out']; ?></th>
        </tr>
        <tr>
          <th>ประเภทห้อง : <?php echo $res['type']; ?></th>
        </tr>
        <tr>
          <th>จำนวนเงิน : <?php echo $res['total']; ?></th>
        </tr>


      </table>
      <table class="container">
        <tr>

          <h3 class="col-sm-12" style="text-align: center;">กรุณาแนบใบเสร็จการชำระเงิน</h3>
          <form action="/action_page.php">
        <tr>
          <th><label class="col-sm-12" style="text-align: center;" for="myfile">เลือกไฟล์:
            </label><input class="col-sm-12" style="text-align: center;" type="file" id="myfile" name="myfile"><br><br></th>
        </tr>

        <tr>
          <th><button class=" w3-button w3-indigo w3-round-xxlarge" onclick="myFunction()"> บันทึกใบเสร็จ </button></th>
          <script>
            function myFunction() {
              window.print()
              location.replace("https://www.w3schools.com")
            }
          </script>
        </tr>

  </form>
  </tr>
  </table>
  </form>

  <footer class="container-fluid text-center">
    <p>Footer Text</p>
  </footer>
</body>

</html>
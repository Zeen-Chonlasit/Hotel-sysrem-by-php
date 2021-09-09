<?php
session_start();
include('server.php');

$errors = array();
echo $_POST['booking'];
$username = $_GET['user'];
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
        header("location: receipt.php?user=$username");
    } else {
        array_push($errors, "");
        $_SESSION['error'] = "";
        header("location: home.php");
    }
} else {
    echo 000;
}
?>

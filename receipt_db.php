<?php
    session_start();
    include('server.php');

    $errors = array();

        $username = mysqli_real_escape_string($conn, $_POST['user']);
        $check_in = mysqli_real_escape_string($conn, $_POST['dti']);

            echo $_GET['user'];
            echo $_GET['user'];


        $user_check_query = "SELECT * FROM customer WHERE username = '$username' OR email = '$email' ";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) {
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }

    
    
?>
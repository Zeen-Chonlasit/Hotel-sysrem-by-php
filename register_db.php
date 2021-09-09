<?php
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if (empty($password_2)) {
            array_push($errors, "The two password do not match");
        }
        if (empty($name)) {
            array_push($errors, "Name is required");
        }
        if (empty($lastname)) {
            array_push($errors, "Lastname is required");
        }
        if (empty($address)) {
            array_push($errors, "Address is required");
        }
        if (empty($tel)) {
            array_push($errors, "Telephone is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }

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

        if (count($errors) == 0) {
            $password = md5($password_1);
        
            $sql = "INSERT INTO customer (username, password, name, lastname, address, phone, email) VALUES ('$username', '$password', '$name', '$lastname', '$address', '$tel', '$email')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: login.php');
        } else {
            array_push($errors, "๊Username or Email already exists");
                $_SESSION['error'] = "Username or Email already exists";
                header("location: register.php");
        }
    }
?>
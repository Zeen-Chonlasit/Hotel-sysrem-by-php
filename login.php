<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script@import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');></script>
    </style>


</head>

<body style="background-image: url('Photo/moon.jpg'); 
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;
            padding-top: 300px;">

    <div class="header">
    
        <h2 style="font-family: 'Lobster', cursive;">Login</h2>
    </div>


    <form action="login_db.php" method="post">
        <p style="font-family: 'Lobster', cursive;">Please fill in your credentials to login.</p>

        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3 style="font-family: 'Lobster', cursive;">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <div class="input-group">
            <label for="username" style="font-family: 'Lobster', cursive;">Username</label>
            <input type="text" name="username" placeholder="Username" value="" style="font-size:15px">
            <span class="help-block"></span>
        </div>
        <div class="input-group" style="font-family: 'Lobster', cursive;">
            <label for="password style="font-family: 'Lobster', cursive;"">Password</label>
            <input type="password" name="password" placeholder="Password" value="" style="font-size:15px">
            <span class="help-block"></span>
        </div>
        <div class="form-group" style="font-size:15px; font-family: 'Lobster', cursive;">
            <button type="submit" name="login_user" class="btn">Login</button>
        </div>
        <p style="font-family: 'Lobster', cursive;">Don't have an account? <a href="register.php">Sign up now</a>.</p>

    </form>
</body>

</html>
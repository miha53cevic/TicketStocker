<?php
    $exists;

    if (!empty($_POST)) {
        $name = $_POST['username'];

        // Hash the password
        $pass = sha1($_POST['password']);

        require_once 'includes/utils.php';
        $handler = createSqlHandler();
        
        // Check if user exists
        $querry = "SELECT type FROM `users` WHERE name = '$name' AND password = '$pass'";
        $handler->querry($querry, true);
        
        if (sql_data_exists($handler)) {
            $exists = true;

            session_start();
            $_SESSION['user'] = $name;
            $_SESSION['type'] = $handler->data[0]['type'];

            // Check if an admin has logged on
            if ($handler->data[0]['type'] == 'admin') {
                header('Location: admin/admin.php');
            } else {
                header('Location: index.php');
            }

        } else {
            $exists = false;
        }

        $handler->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="main.css">
    <title>TicketStocker Login</title>
</head>

<body>

    <div class="main">

        <a class="fa fa-ticket icon" href="index.php"></a>
        <p class="pHeader">Sign in to TicketStocker</p>

        <form action='' method='POST'>
            <div class="login-box">
                <p>Username or email address</p>
                <input class="text-field" type="text" name='username'>
                <p>Password</p>
                <input class="text-field" type="password" name='password'><br>
                <button class="button">Sign in</button>

                <?php
                    if (isset($exists) && !$exists) {
                        print('<p style="color: red" class="textCenter">Incorrect Login</p>');
                        print('<p class="textCenter">New user? Try <a href="signup.php">signing up</a> </p>');
                    }
                ?>

            </div>
        </form>

    </div> <!-- Main -->

</body>

</html>
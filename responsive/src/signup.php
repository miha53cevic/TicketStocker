<?php

    if (!empty($_POST)) {
        $name = $_POST['username'];

        // Hash the password
        $pass = sha1($_POST['password']);

        require_once 'includes/utils.php';
        $handler = createSqlHandler();
        
        // Add user
        $querry = "INSERT INTO users(name, password, type) VALUES ('$name', '$pass', 'user')";
        $handler->querry($querry, false);

        $handler->close();

        header('Location: login.php');
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
        <p class="pHeader">Sign up for TicketStocker</p>

        <form action='' method='POST'>
            <div class="login-box">
                <p>Username or Email adress</p>
                <input class="text-field" type="text" name='username'>
                <p>Password</p>
                <input class="text-field" type="password" name='password'><br>
                <button class="button">Sign up</button>
            </div>
        </form>

    </div>

</body>

</html>
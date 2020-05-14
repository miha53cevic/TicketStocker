<?php

    require_once 'includes/utils.php';

    $exists;

    if (!empty($_GET) && isset($_GET['search_query']) && $_GET["search_query"] != '') {
        $name = $_GET['search_query'];

    } else if (!empty($_GET) && isset($_GET['results'])) {
        $name = $_GET['results'];
    }

    if (isset($name)) {
        $handler = createSqlHandler();
        $handler->querry("SELECT id, name, date FROM ticket WHERE ticket.name LIKE '%$name%'", true);
    }
    
    // Check if the ticket data exists
    if (isset($name) && sql_data_exists($handler)) {
        $exists = true;
    } else {
        $exists = false;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="main.css">
    <title> TicketStocker </title>
</head>

<body>

    <a href="#top" class="fa fa-arrow-up fa-lg top-icon button"></a>

    <main class="main">
        <a name="top"></a>

            <header class="header">
                <h1 class="header-title"> <a href="index.php" class="header-title">TicketStocker</a> </h1>

                <div class="col justify-content-center relative">
                    <form action='' method='GET'>
                        <input class="search-field" style='width: 20rem' type="search" placeholder="Search"
                            name='search_query'>
                        <button class="button search-button align-self-center" id="searchButton"><i
                                class="fa fa-search"></i></button>
                    </form>
                </div>
                
                <!-- Dodati Logout, i dobrodašo Username -->
                <a class="header-item" href="login.php">Login</a>
                <a class="header-item" href="signup.php">SignUp</a>
            </header>


        <div class="container transparent" style='width: 600px'>
            <div class="container w100">
                <div class="content">
                    <h1 class="hHeader textLeft"> Search results </h1>

                    <?php
                        if (isset($exists) && $exists) {
                            foreach ($handler->data as $row) {
                                printf('<div class="ticket-pannel" style="background-image: url(../images/%s.jpg);">', $row['id']);
                                printf('<div class="ticket-text">');
                                printf('<p class="ticket-p">%s</p>', $row['name']);
                                printf('<p class="ticket-p">%s</p>', date_format(date_create($row['date']), 'd.m.Y'));
                                printf('</div>');
                                printf('<div class="ticket-button-area">');
                                print('<form action="ticket/ticket_info.php" method="GET">');
                                print('<button type="submit" class="button" type="button">More Info</button>');
                                printf('<input type="hidden" name="id" value="%s">', $row['id']);
                                print('</form>');
                                printf('</div>');
                                printf('</div>');
                            }
                        }

                    ?>
                    
                </div> <!-- Content -->
            </div> <!-- New container -->

        </div> <!-- Main Page Content Container -->

        <footer class="footer">
            <h1>Contact</h1>
            <p>e-mail: miha53cevic</p>
            <p>tel: 123 456 789</p>
        </footer>

    </main>

</body>

</html>
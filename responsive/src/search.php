<?php

    require_once 'includes/utils.php';

    $exists;

    if (!empty($_GET) && !isset($_GET["results"]) && $_GET["search_query"] != '') {
        $name = $_GET["search_query"];

        $handler = createSqlHandler();
        $handler->querry("SELECT id, name FROM ticket WHERE ticket.name LIKE '%$name%'", true);

        // Check if the ticket data exists
        if (sql_data_exists($handler)) {
            $exists = true;
        } else {
            $exists = false;
            header('Location: search.php?results=false');
        }
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

                        <?php
                            if (isset($exists) && $exists) {
                                printf('<div class="searching-pannel col shadow" style="bottom: -%spx;">', count($handler->data) * 75 + 40);

                                for ($i = 0; $i < 4; $i++) {
                                    if ($i >= count($handler->data)) {
                                        break;
                                    }
    
                                    printf('<a href="ticket/ticket_info.php?id=%s">', $handler->data[$i]['id']);
                                    print('<div class="search-result row">');
                                    printf('<img src="../images/%s.jpg">', $handler->data[$i]['id']);
                                    printf('<p>%s</p>', $handler->data[$i]['name']);
                                    print('</div>');
                                    print('</a>');
                                }

                                print('<a href="search.php" class="button border0 border-radius0">More</a>');
                                print('</div>');
                            } 
                        ?>
                </div>
                
                <!-- Dodati Logout, i dobrodašo Username -->
                <a class="header-item" href="login.php">Login</a>
                <a class="header-item" href="signup.php">SignUp</a>
            </header>


        <div class="container transparent">
            <div class="container w100">
                <div class="content">
                    <h1 class="hHeader textLeft"> Search results </h1>

                    <?php
                        printf("");
                        printf("");
                        printf("");
                        printf("");
                        printf("");
                        printf("");
                        printf("");
                        printf("");
                        printf("");
                        printf("");
                        printf("");
                        printf("");
                    ?>

                    <div class="ticket-pannel" style="background-image: url('images/star_wars.jpg');">
                        <div class="ticket-text">
                            <p class="ticket-p">Cinestar Star Wars IX</p>
                            <p class="ticket-p">26.12.2019.</p>
                        </div>
                        <div class="ticket-button-area">
                            <a href="#infoIDStarWarsXI" class="button" type="button">More Info</a>
                        </div>
                    </div>
                    <div class="ticket-pannel" style="background-image: url('images/star_wars3.jpg');">
                        <div class="ticket-text">
                            <p class="ticket-p">Cinestar Star Wars III</p>
                            <p class="ticket-p">26.5.2001.</p>
                        </div>
                        <div class="ticket-button-area">
                            <a href="#infoIDStarWarsIII" class="button" type="button">More Info</a>
                        </div>
                    </div>
                    <div class="ticket-pannel" style="background-image: url('images/star_wars.jpg');">
                        <div class="ticket-text">
                            <p class="ticket-p">Cinestar Star Wars IX</p>
                            <p class="ticket-p">26.12.2019.</p>
                        </div>
                        <div class="ticket-button-area">
                            <a href="#infoIDStarWarsXI" class="button" type="button">More Info</a>
                        </div>
                    </div>

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
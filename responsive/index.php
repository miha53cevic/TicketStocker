<?php
    $exists;

    if (!empty($_GET) && $_GET["search_query"] != '') {
        $name = $_GET["search_query"];

        require_once 'includes/SqlHandler.php';
        
        $handler = new SqlHandler('localhost', 'root', '', 'ticket_stocker');
        $handler->querry("SELECT id, name FROM ticket WHERE ticket.name LIKE '%$name%'", true);

        // Check if the ticket data exists
        if (count($handler->data)) {
            $exists = true;
        } else {
            $exists = false;
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

    <div class="sidebar">
        <a class="items" href="#new"> New </a>
        <a class="items" href="#popular"> Popular </a>
        <a class="items" href="#sale"> Sale </a>
        <a class="items" href="#contact"> Contact </a>
    </div>

    <a href="#top" class="fa fa-arrow-up fa-lg top-icon button"></a>

    <main class="main">
        <a name="top"></a>

        <div class="container margin0 w100 h100vh header-background shadow">
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
    
                                    printf('<a href="ticket-info.php?id=%s">', $handler->data[$i]['id']);
                                    print('<div class="search-result row">');
                                    printf('<img src="images/%s.jpg">', $handler->data[$i]['id']);
                                    printf('<p>%s</p>', $handler->data[$i]['name']);
                                    print('</div>');
                                    print('</a>');
                                }

                                print('<a href="search.html" class="button border0 border-radius0">More</a>');
                                print('</div>');
                            }
                        ?>
                </div>

                <a class="header-item" href="login.php">Login</a>
                <a class="header-item" href="signup.php">SignUp</a>
                <i class="fa fa-bars fa-lg header-item" id="navButton"></i>
            </header>
        </div> <!-- Header and Search Container -->

        <div class="container transparent">

            <a name="new"></a>
            <br><br><br>

            <div class="container">
                <div class="content">
                    <h1 class="hHeader textLeft"> Newly added </h1>

                    <?php
                        require_once 'includes/SqlHandler.php';
        
                        $handler = new SqlHandler('localhost', 'root', '', 'ticket_stocker');
                        $handler->querry("SELECT * FROM ticket ORDER BY id DESC LIMIT 6", true);

                        //$date = date_format(date_create($_POST['ticket_date']), 'd.m.Y');
                        // Create the newly added tickets
                        $iterator = 0;
                        for ($i = 0; $i < 3; $i++) {
                            print('<div class="row">');
                            for ($j = 0; $j < 2; $j++) {
                                printf('<div class="ticket-pannel" style="background-image: url(images/%s.jpg);">', $handler->data[$iterator]['id']);
                                print('<div class="ticket-text">');
                                printf('<p class="ticket-p">%s</p>', $handler->data[$iterator]['name']);
                                printf('<p class="ticket-p">%s</p>', date_format(date_create($handler->data[$iterator]['date']), 'd.m.Y'));
                                print('</div>');
                                print('<div class="ticket-button-area">');
                                print('<form action="ticket_info.php" method="GET">');
                                print('<button type="submit" class="button" type="button">More Info</button>');
                                printf('<input type="hidden" name="id" value="%s">', $handler->data[$iterator]['id']);
                                print('</form>');
                                print('</div>');
                                print('</div>');

                                $iterator++;
                            }
                            print('</div>');
                        }
                    ?>

                </div> <!-- Content -->
            </div> <!-- New container -->

            <a name="popular"></a>
            <br><br><br><br><br><br><br><br><br><br>

            <div class="container">
                <div class="content">
                    <h1 class="hHeader textLeft"> Popular </h1>
                    <div class="row">

                        <?php
                            for ($i = 0; $i < 3; $i++) {
                                printf('<div class="popular-pannel brighten">');
                                printf('<a href="#infoIDparty2019"><img class="popular-image" alt="image" src="images/crowd.jpg"></a>');
                                printf('<p class="popularP">Party 2019</p>');
                                printf('</div>');
                            }
                        ?>

                    </div> <!-- Row -->
                </div> <!-- Content -->
            </div> <!-- Popular container -->

            <a name="sale"></a>
            <br><br><br><br><br><br><br><br><br><br>

            <div class="container">
                <div class="content">
                    <h1 class="hHeader textLeft"> On sale </h1>

                    <?php
                            require_once 'includes/SqlHandler.php';
        
                            $handler = new SqlHandler('localhost', 'root', '', 'ticket_stocker');
                            $handler->querry("SELECT * FROM `ticket` WHERE CURRENT_DATE - date <= 7", true);
                            
                            $iterator = 0;
                            for ($i = 0; $i < (count($handler->data)) / 2; $i++) {
                                print('<div class="row">');
                                for ($j = 0; $j < 2; $j++) {

                                    // Check if there is an odd number of items
                                    if ($iterator >= count($handler->data)) {
                                        break;
                                    }

                                    printf('<div class="ticket-pannel" style="background-image: url(images/%s.jpg);">', $handler->data[$iterator]['id']);
                                    print('<i class="fa fa-tag discountIcon">30%</i>');
                                    print('<div class="ticket-text">');
                                    printf('<p class="ticket-p">%s</p>', $handler->data[$iterator]['name']);
                                    printf('<p class="ticket-p">%s</p>', date_format(date_create($handler->data[$iterator]['date']), 'd.m.Y'));
                                    print('</div>');
                                    print('<div class="ticket-button-area">');
                                    print('<form action="ticket_info.php" method="GET">');
                                    print('<button type="submit" class="button" type="button">More Info</button>');
                                    printf('<input type="hidden" name="id" value="%s">', $handler->data[$iterator]['id']);
                                    print('</form>');
                                    print('</div>');
                                    print('</div>');

                                    $iterator++;
                                }
                                print('</div>');
                            }
                        ?>

                </div> <!-- Content -->
            </div> <!-- On sale container -->

        </div> <!-- Main Page Content Container -->

        <a name="contact"></a>
        <br><br><br><br><br><br><br><br><br><br>

        <?php
            include 'includes/footer.php'
        ?>

    </main>

</body>

<script>
const sidebar = document.getElementsByClassName('sidebar')[0];
const navButton = document.getElementById('navButton');

let sidebarOpen = false;

navButton.addEventListener('click', () => {
    if (sidebarOpen) {
        sidebarOpen = false;
        sidebar.style.width = '0';
        sidebar.style.visibility = 'hidden';
        document.getElementsByClassName('main')[0].style.marginRight = "0";
    } else {
        sidebarOpen = true;
        sidebar.style.width = '300px';
        sidebar.style.visibility = 'visible';
        document.getElementsByClassName('main')[0].style.marginRight = "300px";
    }
});
</script>

</html>
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
                    <input class="search-field" type="search" placeholder="Search">
                    <div class="searching-pannel col shadow">
                        <a href="ticket-info.html">
                            <div class="search-result row">
                                <img src="images/star_wars3.jpg">
                                <p>Star Wars III</p>
                            </div>
                        </a>
                        <a href="#infoIDStarWarsIX">
                            <div class="search-result row">
                                <img src="images/star_wars.jpg">
                                <p>Star Wars IX</p>
                            </div>
                        </a>
                        <a href="search.html" class="button border0 border-radius0">More</a>
                    </div>
                </div>

                <button class="button search-button align-self-center" id="searchButton"><i
                        class="fa fa-search"></i></button>
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
                        // Create the newly added tickets
                        for ($i = 0; $i < 3; $i++) {
                            print('<div class="row">');
                            for ($j = 0; $j < 2; $j++) {
                                print('<div class="ticket-pannel" style="background-image: url(images/star_wars.jpg);">');
                                print('<div class="ticket-text">');
                                print('<p class="ticket-p">Cinestar Star Wars IX</p>');
                                print('<p class="ticket-p">26.12.2019.</p>');
                                print('</div>');
                                print('<div class="ticket-button-area">');
                                print('<a href="#infoIDStarWarsXI" class="button" type="button">More Info</a>');
                                print('</div>');
                                print('</div>');
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
                                print('<div class="popular-pannel brighten">');
                                print('<a href="#infoIDparty2019"><img class="popular-image" alt="image" src="images/crowd.jpg"></a>');
                                print('<p class="popularP">Party 2019</p>');
                                print('</div>');
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
                            for ($i = 0; $i < 1; $i++) {
                                print('<div class="row">');
                                for ($j = 0; $j < 2; $j++) {
                                    print('<div class="ticket-pannel" style="background-image: url(images/star_wars.jpg);">');
                                    print('<i class="fa fa-tag discountIcon">30%</i>');
                                    print('<div class="ticket-text">');
                                    print('<p class="ticket-p">Cinestar Star Wars IX</p>');
                                    print('<p class="ticket-p">26.12.2019.</p>');
                                    print('</div>');
                                    print('<div class="ticket-button-area">');
                                    print('<a href="#infoIDStarWarsXI" class="button" type="button">More Info</a>');
                                    print('</div>');
                                    print('</div>');
                                }
                                print('</div>');
                            }
                        ?>

                </div> <!-- Content -->
            </div> <!-- On sale container -->

        </div> <!-- Main Page Content Container -->

        <a name="contact"></a>
        <br><br><br><br><br><br><br><br><br><br>

        <footer class="footer">
            <h1>Contact</h1>
            <p>e-mail: miha53cevic</p>
            <p>tel: 123 456 789</p>
        </footer>

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

    const search = document.getElementsByClassName('search-field')[0];
    const searchButton = document.getElementById('searchButton');

    search.addEventListener('search', () => {
        document.getElementsByClassName('searching-pannel')[0].style.visibility = 'visible';
    });

    searchButton.addEventListener('click', () => {
        document.getElementsByClassName('searching-pannel')[0].style.visibility = 'visible';
    });
</script>

</html>
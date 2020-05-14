<?php



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
    <link rel="stylesheet" href="../main.css">
    <script src='../jquery/3.4.1/jquery.min.js'></script>
    <title> TicketStocker </title>
</head>

<body>

    <a href="#top" class="fa fa-arrow-up fa-lg top-icon button"></a>

    <main class="main">

        <header class="header bg-sec-colour">
            <h1 class="header-title"> <a href="../index.php" class="header-title">TicketStocker</a> </h1>

            <a class="header-item" href="../login.php">Login</a>
            <a class="header-item" href="../signup.php">SignUp</a>
        </header>

        <div class="container transparent align-items-center">
            <div class="container w100 align-items-center">
                <h1 class="hHeader"> Star Wars III </h1>
            </div>
            <div class="row">
                <div class="container w100 align-items-center">
                    <div class="content">
                        <div class="col" id="time-list">
                            <i class="pHeader">Available times</i>
                            <hr>
                        </div>

                    </div> <!-- Content -->
                </div> <!-- New container -->

                <div class="container w100 align-items-center">
                    <div class="content">
                        <div class="col">
                            <div id="canvasArea"></div><br>
                            <p class="pHeader">Time: <span id="time">11:00</span> </p>
                            <p class="pHeader">Seat: <span id="seat">5</span> </p><br>
                            <div class="row justify-content-center">
                                <p class="pHeader">Amount:</p>
                                <input class="text-field" min="1" max="5" style="width: 3.5rem;" type="number" value="1">
                            </div><br>
                            <button class="button">Buy</button>
                        </div>

                    </div>

                </div> <!-- Content -->
            </div> <!-- New container -->
        </div> <!-- Row -->


        <div class="container transparent align-items-center">
            <div class="container w100 align-items-center" style="padding: 1rem">
                <a href='../index.php' style='text-decoration: none;' class='button'>Go back</a>
            </div>
        </div>

        </div> <!-- Main Page Content Container -->

        <br><br><br><br><br><br><br><br><br><br><br><br>

        <footer class="footer">
            <h1>Contact</h1>
            <p>e-mail: miha53cevic</p>
            <p>tel: 123 456 789</p>
        </footer>

    </main>

</body>

<script>

    // Setup time choosing
    const times = ['10:00', '13:00', '16:00', '19:00'];
    times.forEach(element => {
        $("#time-list").append(`<p class="pText pHover">${element}</p>`);
        $("#time-list").append("<hr>");

        $("#time-list").on('click', 'p', function() {
            $("#time").text($(this).text());
        });
    });

</script>

</html>
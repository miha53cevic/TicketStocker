<?php

$id = $_GET['id'] | 0;

require_once '../includes/utils.php';
$handler = createSqlHandler();
$handler->querry("SELECT ticket.name, ticket.price, times.time1, times.time2, times.time3, seats.row, seats.col FROM ticket, times, seats WHERE $id = ticket.id AND ticket.id = times.id AND ticket.id = seats.id", true);

// Check for case if the ticket by requested ID doesn't exist
if (!sql_data_exists($handler)) {
    echo '<h1 style="color: white;">Error: could not find given ticket!</h1>';
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
            <div class="container w100 align-items-center ticket-pannel" style="background-image: url('../../images/<?php echo $_GET['id'] ?>.jpg');">
                <h1 class="hHeader text-outline"> <?php echo $handler->data[0]['name']; ?> </h1>
            </div>
            <div class="row">
                <div class="container w100 align-items-center">
                    <div class="content">
                        <div class="col" id="time-list">
                            <i class="pHeader">Available times</i>
                            <hr>
                                <?php  
                                    
                                    $time1 = $handler->data[0]['time1'];
                                    $time2 = $handler->data[0]['time2'];
                                    $time3 = $handler->data[0]['time3'];

                                    $noTime = '00:00:00';
                                    if ($time1 != $noTime) {
                                        echo "<p class='pText pHover'>$time1</p>";
                                        echo "<hr>";
                                    }

                                    if ($time2 != $noTime) {
                                        echo "<p class='pText pHover'>$time2</p>";
                                        echo "<hr>";
                                    }
                                    
                                    if ($time3 != $noTime) {
                                        echo "<p class='pText pHover'>$time3</p>";
                                    }
                                        
                                ?>
                                </div>

                        </div> <!-- Content -->
                    </div> <!-- New container -->

                    <div class="container w100 align-items-center">
                        <div class="content">
                        <div class="col">
                            <div id="canvasArea"></div><br>
                            <p class="pHeader">Time: <span id="time">none selected</span> </p>
                            <hr>
                            
                            <?php 
                            
                                if ($handler->data[0]['row'] != 0 && $handler->data[0]['col'] != 0) {
                                    printf('<p class="pHeader">Seat: <span id="seat">1 row, 1 col</span> </p><br>');
                                    printf('<div class="row justify-content-center">');
                                    printf('<p class="pHeader">Row:</p>');
                                    printf('<input class="text-field" min="1" max="%s" style="width: 3.5rem;" type="number" value="1" id="seat_row">', $handler->data[0]['row']);
                                    printf('<p class="pHeader">Column:</p>');
                                    printf('<input class="text-field" min="1" max="%s" style="width: 3.5rem;" type="number" value="1" id="seat_col">', $handler->data[0]['col']);
                                    printf('</div><br>');
                                }
                            
                            ?>

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

        <?php 
            include '../includes/footer.php';
        ?>

    </main>

</body>

<script>

    // Setup time choosing
    for (let i = 0; i < 3; i++) {
        $("#time-list").on('click', 'p', function() {
            $("#time").text($(this).text());
        });
    }

    let seatRow = 1;
    let seatCol = 1;
    $("#seat_row").on('click', function() {
        seatRow = $(this).val();
        $("#seat").text(`${seatRow} row, ${seatCol} col`);
    });

    $("#seat_col").on('click', function() {
        seatCol = $(this).val();
        $("#seat").text(`${seatRow} row, ${seatCol} col`);
    });

</script>

</html>
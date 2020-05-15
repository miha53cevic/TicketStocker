<?php

$id = $_GET['id'] | 0;

require_once '../includes/utils.php';
$handler = createSqlHandler();
$handler->querry("SELECT ticket.name, ticket.price, times.time1, times.time2, times.time3, seats.row, seats.col, discounts.discount FROM ticket, times, seats, discounts WHERE $id = ticket.id AND ticket.id = times.id AND ticket.id = seats.id AND discounts.id = ticket.id", true);

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
    <p style="display: none;" id='id'><?php echo "{$_GET['id']}" ?></p>

    <main class="main">

        <header class="header bg-sec-colour">
            <h1 class="header-title"> <a href="../index.php" class="header-title">TicketStocker</a> </h1>

            <a class="header-item" href="../login.php">Login</a>
            <a class="header-item" href="../signup.php">SignUp</a>
        </header>

        <div class="container transparent align-items-center">
            <div class="container w100 align-items-center ticket-pannel"
                style="background-image: url('../../images/<?php echo $_GET['id'] ?>.jpg');">
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
                            <p class="pHeader">Time: <span id="time">none selected</span> </p>
                            <hr>

                            <?php 
                            
                                if ($handler->data[0]['row'] != 0 && $handler->data[0]['col'] != 0) {
                                    printf('<p class="pHeader">Seat: <span id="seat">1 row, 1 col</span> </p><br><br><br>');
                                    printf('<div class="row justify-content-center">');
                                    printf('<p class="pHeader">Row:</p>');
                                    printf('<input class="text-field" min="1" max="%s" style="width: 3.5rem;" type="number" value="1" id="seat_row">', $handler->data[0]['row']);
                                    printf('<p class="pHeader">Column:</p>');
                                    printf('<input class="text-field" min="1" max="%s" style="width: 3.5rem;" type="number" value="1" id="seat_col">', $handler->data[0]['col']);
                                    printf('</div><br>');
                                }
                                
                                $discount = (int)$handler->data[0]['discount'];
                                $init_price = $handler->data[0]['price'];
                                if ($discount != 0) {
                                    $discount = 100 - $discount;
                                    $discount /= 100;
                                    printf('<p class="pHeader">Price: <span style="font-family: arial;">%s€ <span style="text-decoration: line-through; font-family: arial;">(%s€)</span></span> </p>', $init_price * $discount, $init_price);

                                } else {
                                    printf('<p class="pHeader">Price: <span style="font-family: arial;">%s€</span> </p>', $handler->data[0]['price']);
                                }
                            
                            ?>
                            <br>
                            <button class="button" id="buy">Buy</button>
                            <h3 id='ticket_sold' style='color: red;'>Ticket already sold!</h3>
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
            $handler->close();
        ?>

    </main>

</body>

<script>
$("#ticket_sold").hide();

// Setup time choosing
for (let i = 0; i < 3; i++) {
    $("#time-list").on('click', 'p', function() {
        $("#time").text($(this).text());
        $("#ticket_sold").hide();
    });
}

let seatRow = 1;
let seatCol = 1;
$("#seat_row").on('click', function() {
    seatRow = parseInt($(this).val());
    $("#seat").text(`${seatRow} row, ${seatCol} col`);
    $("#ticket_sold").hide();
});

$("#seat_col").on('click', function() {
    seatCol = parseInt($(this).val());
    $("#seat").text(`${seatRow} row, ${seatCol} col`);
    $("#ticket_sold").hide();
});

$("#buy").on('click', function() {
    $.ajax({
        type: 'GET',
        url: '../server_requests/buy_ticket.php',
        data: {
            seatNum: (parseInt($("#seat_col").attr('max')) * (seatRow - 1)) + (seatCol - 1) + 1,
            time: $("#time").html(),
            id: $("#id").html()
        },
        success: function(result) {
            result.replace(/\s/g,'');
            console.log(result);
            if (result == 'time_error') {
                $('#time').text("Select a time!");
            } else if (result == 'sold_error') {
                $("#ticket_sold").text("Ticket already sold!");
                $("#ticket_sold").show();
            } else if (result == 'success') {
                $("#ticket_sold").text("Ticket bought!");
                $("#ticket_sold").show();
            }
        }
    });
});
</script>

</html>
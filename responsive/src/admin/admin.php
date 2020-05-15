<?php
    session_start();

    $exists;

    if (!empty($_GET)) {
        $name = $_GET["change_ticket_name"];

        require_once '../includes/utils.php';
        
        $handler = createSqlHandler();
        $handler->querry("SELECT id FROM ticket WHERE ticket.name = '$name'", true);

        $id;

        // Check if the ticket exists
        if (sql_data_exists($handler)) {
            $id = $handler->data[0]['id'];
            $handler->querry("SELECT * FROM ticket, seats, ticket_num, times, discounts WHERE ticket.id = '$id' AND seats.id = '$id' AND ticket_num.id = '$id' AND times.id = '$id' AND discounts.id = '$id'", true);
        }

        // Check if the ticket data exists
        if (sql_data_exists($handler)) {
            $exists = true;

            // Get all the info about the ticket
            $date = $handler->data[0]['date'];
            $price = $handler->data[0]['price'];
            $ticket_num = $handler->data[0]['ticket_num'];
            $ticket_time1 = $handler->data[0]['time1'];
            $ticket_time2 = $handler->data[0]['time2'];
            $ticket_time3 = $handler->data[0]['time3'];
            $ticket_row = $handler->data[0]['row'];
            $ticket_col = $handler->data[0]['col'];
            $discount = $handler->data[0]['discount'];

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
    <link rel="stylesheet" href="../main.css">
    <title> TicketStockerAdmin </title>
</head>

<body>

    <a href="#top" class="fa fa-arrow-up fa-lg top-icon button"></a>

    <main class="main">
        <a name="top"></a>

        <header class="header bg-sec-colour">
            <h1 class="header-title"> <a href="../index.php" class="header-title">TicketStocker - Admin</a> </h1>
            <a class="header-item" href="../index.php">Main page</a>
            <a class="header-item" href="../logout.php">Logout</a>
        </header>

        <br><br><br><br><br>

        <div class="row">

            <div class="container bg-sec-colour" style="color: white;">
                <div class="content paddingL">

                    <form action='../server_requests/add_ticket.php' method='POST' enctype='multipart/form-data'>
                        <h1 style="color: white;">Add ticket</h1>
                        <p class="pHeader">Name</p>
                        <input class="text-field" type="text" name='ticket_name' required><br><br>
                        <p class="pHeader">Date</p>
                        <input class="text-field" type="date" name='ticket_date' required><br><br>
                        <p class="pHeader">Price</p>
                        <input class="text-field w50" type="number" name='ticket_price'>
                        <br><br>
                        <p class="pHeader">Number of tickets</p>
                        <input class="text-field w50" type="text" name='ticket_num' required><br><br>
                        <p class="pHeader">Image (only jpeg)</p>
                        <input type="file" accept="image/jpeg" name='ticket_img' id='ticket_img' required><br><br>
                        <p class="pHeader">Times</p>
                        <div class="row justify-content-center">
                            <input type="time" name='ticket_time1'>
                            <input type="time" name='ticket_time2'>
                            <input type="time" name='ticket_time3'>
                        </div><br><br>
                        <p class="pHeader">Number of seats</p>
                        <p class="pText">Rows</p>
                        <input type="number" class="text-field" style="width: 4rem;" name='ticket_row' required>
                        <p class="pText">Columns</p>
                        <input type="number" class="text-field" style="width: 4rem;" name='ticket_col' required>
                        <p class="pText">Discount</p>
                        <input type="number" class="text-field" max="100" min="0" value="0" style="width: 4rem;" name='discount' required>
                        <br><br><br>
                        <input type='submit' class="button w100" value='Add ticket'></input>
                </div>
                </form>
            </div>

            <div class="container bg-sec-colour" style="color: white;">
                <div class="content paddingL">

                    <form action='' method='GET'>
                        <h1 style="color: white;">Change ticket</h1>
                        <p class="pHeader">Enter ticket name</p>
                        <input class="text-field w100" type="text" name='change_ticket_name'><br><br>
                        <input type="submit" value='Find' class="button w50">
                    </form><br><br><br>

                    <?php
                        // Write: searched up ticket info or No ticket exists with that name
                        if (isset($exists) && $exists) {
                            printf('<form action="../server_requests/change_ticket.php" method="POST" enctype="multipart/form-data">');
                            printf('<p class="pHeader">Name</p>');
                            printf('<input class="text-field" type="text" name="ticket_name" value="%s"><br><br>', $name);
                            printf('<p class="pHeader">Date</p>');
                            printf('<input class="text-field" type="date" name="ticket_date" value="%s"><br><br>', $date);
                            printf('<p class="pHeader">Price</p>');
                            printf('<input class="text-field w50" type="number" name="ticket_price" value="%s">', $price);
                            printf('<br><br>');
                            printf('<p class="pHeader">Number of tickets</p>');
                            printf('<input class="text-field w50" type="text" name="ticket_num" value="%s"><br><br>', $ticket_num);
                            printf('<p class="pHeader">Image</p>');
                            printf('<input type="file" accept="image/jpeg" name="ticket_img"><br><br>');
                            printf('<p class="pHeader">Times</p>');
                            printf('<div class="row justify-content-center">');
                            printf('<input type="time" name="ticket_time1" value="%s">', $ticket_time1);
                            printf('<input type="time" name="ticket_time2" value="%s">', $ticket_time2);
                            printf('<input type="time" name="ticket_time3" value="%s">', $ticket_time3);
                            printf('</div><br><br>');
                            printf('<p class="pHeader">Number of seats</p>');
                            printf('<p class="pText">Rows</p>');
                            printf('<input type="number" class="text-field" style="width: 4rem;" name="ticket_row" value="%s">', $ticket_row);
                            printf('<p class="pText">Columns</p>');
                            printf('<input type="number" class="text-field" style="width: 4rem;" name="ticket_col" value="%s">', $ticket_col);
                            printf('<p class="pText">Discount</p>');
                            printf('<input type="number" class="text-field" max="100" min="0" value="%s" style="width: 4rem;" name="discount">', $discount);
                            printf('<br><br>');
                            printf('<p class="pHeader">Remove ticket</p>');
                            printf('<input type="checkbox" name="ticket_remove">');
                            printf('<br><br><br>');
                            printf('<input type="hidden" name="id" value="%s">', $id);
                            printf('<input type="submit" class="button w100" value="Change ticket"></input>');
                            printf('</form>');
                        } else if (isset($exists) && !$exists) {
                            print('<p style="color: red"> Ticket does not exist! </p>');
                        }
                    ?>

                </div>
            </div>
        </div>

        <br><br><br><br><br>

        <?php
            include 'includes/footer.php';
            $handler->close();
        ?>

    </main>

</html>
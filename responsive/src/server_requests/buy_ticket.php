<?php

    $seatNum = $_GET['seatNum'];
    $time = $_GET['time'];
    $id = $_GET['id'];

    // if the ticket doesn't have seats set them to -1
    if ($seatNum == 0) {
        $seatNum = -1;
    }

    //echo "SeatNumber: $seatNum\n";
    //echo "Time: $time\n";
    //echo "Id: $id";

    if ($time == 'none selected' || $time == 'Select a time!') {
        //echo "\nNo time given!\nExisting...";
        echo("time_error");
    } else {

        require_once '../includes/utils.php';
        $handler = createSqlHandler();

        // Check if ticket exists
        if ($seatNum != -1) {
            $handler->querry("SELECT * FROM sold_seats WHERE id = $id AND time = '$time' AND seat_num = $seatNum", true);
        }

        if (sql_data_exists($handler)) {
            echo("sold_error");
        } else {
            // If it hasn't been sold add it to sold_seats
            $handler->querry("INSERT INTO sold_seats(id, seat_num, time) VALUES ('$id', '$seatNum', '$time')", false);
            echo "success";
        }
    }

?>

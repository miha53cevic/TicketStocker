
<?php
    //$date = date_format(date_create($_GET['ticket_date']), 'd.m.Y');

    $id = $_GET['id'];
    $name = $_GET['ticket_name'];
    $date = $_GET['ticket_date'];
    $price = $_GET['ticket_price'];
    $ticket_num = $_GET['ticket_num'];
    $ticket_time1 = $_GET['ticket_time1'];
    $ticket_time2 = $_GET['ticket_time2'];
    $ticket_time3 = $_GET['ticket_time3'];
    $ticket_row = $_GET['ticket_row'];
    $ticket_col = $_GET['ticket_col'];
    $ticket_remove = $_GET['ticket_remove'];

    require_once '../includes/SqlHandler.php';
    $handler = new SqlHandler('localhost', 'root', '', 'ticket_stocker');

    // Update ticket
    if (!$ticket_remove) {

        $querry1 = "UPDATE ticket SET name = '$name', date = '$date', price = '$price' WHERE ticket.id = '$id'";
        $handler->querry($querry1, false);

        $querry2 = "UPDATE ticket_num SET ticket_num = '$ticket_num' WHERE ticket_num.id = '$id'";
        $handler->querry($querry2, false);

        $querry3 = "UPDATE times SET time1 = '$ticket_time1', time2 = '$ticket_time2', time3 = '$ticket_time3' WHERE times.id = '$id'";
        $handler->querry($querry3, false);

        $querry4 = "UPDATE seats SET row = '$ticket_row', col = '$ticket_col' WHERE seats.id = '$id'";
        $handler->querry($querry4, false);
    } else {
        // Remove ticket
        $querry = "DELETE FROM ticket WHERE id = $id;";
        $querry .= "DELETE FROM ticket_num  WHERE id = $id;";
        $querry .= "DELETE FROM times WHERE id = $id;";
        $querry .= "DELETE FROM seats WHERE id = $id;";
        $querry .= "DELETE FROM sold_seats WHERE id = $id";

        $handler->querryMulti($querry);
    }

    $handler->close();

    // Redirect back to main site
    header('Location: ../admin.php');
?>
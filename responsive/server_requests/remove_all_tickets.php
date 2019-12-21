<?php
    require_once '../includes/SqlHandler.php';

    $handler = new SqlHandler('localhost', 'root', '', 'ticket_stocker');
    $querry = "DELETE FROM ticket;";
    $querry .= "DELETE FROM ticket_num;";
    $querry .= "DELETE FROM times;";
    $querry .= "DELETE FROM seats;";
    $querry .= "DELETE FROM sold_seats";
    $handler->querryMulti($querry);
    $handler->close();

    // Redirect back to main site
    header('Location: ../admin.php');
?>
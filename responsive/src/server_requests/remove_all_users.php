<?php
    require_once '../includes/SqlHandler.php';

    $handler = new SqlHandler('localhost', 'root', '', 'ticket_stocker');
    $querry = "DELETE FROM users;";
    $handler->querry($querry, false);
    $handler->close();

    // Redirect back to main site
    header('Location: ../admin.php');
?>
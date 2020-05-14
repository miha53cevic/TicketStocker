
<?php
    //$date = date_format(date_create($_POST['ticket_date']), 'd.m.Y');

    $name = $_POST['ticket_name'];
    $date = $_POST['ticket_date'];
    $price = $_POST['ticket_price'];
    $ticket_num = $_POST['ticket_num'];
    $ticket_time1 = $_POST['ticket_time1'];
    $ticket_time2 = $_POST['ticket_time2'];
    $ticket_time3 = $_POST['ticket_time3'];
    $ticket_row = $_POST['ticket_row'];
    $ticket_col = $_POST['ticket_col'];

    require_once '../includes/SqlHandler.php';
    $handler = new SqlHandler('localhost', 'root', '', 'ticket_stocker');

    $querry1 = "INSERT INTO ticket(name, date, price) VALUES ('$name', '$date', '$price')";
    $handler->querry($querry1, false);

    $id = $handler->id;

    $querry2 = "INSERT INTO ticket_num(id, ticket_num) VALUES ('$id', '$ticket_num')";
    $handler->querry($querry2, false);

    $querry3 = "INSERT INTO times(id, time1, time2, time3) VALUES ('$id', '$ticket_time1', '$ticket_time2', '$ticket_time3')";
    $handler->querry($querry3, false);

    $querry4 = "INSERT INTO seats(id, row, col) VALUES ('$id', '$ticket_row', '$ticket_col')";
    $handler->querry($querry4, false);

    $handler->close();

    // Save the image
    $info = pathinfo($_FILES["ticket_img"]['name']);
    $ext = $info['extension']; // get the extension of the file
    $newname = "$id.$ext"; 

    $target = '../../images/'.$newname;
    move_uploaded_file( $_FILES["ticket_img"]['tmp_name'], $target);

    // Redirect back to main site
    header('Location: ../admin/admin.php');
?>
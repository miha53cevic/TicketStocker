<?php

require_once 'SqlHandler.php';

function createSqlHandler() {
    return new SqlHandler('localhost', 'root', '', 'ticket_stocker');
}

function sql_data_exists($handler) {
    return count($handler->data) > 0;
}

?>                
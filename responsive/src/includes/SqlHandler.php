<?php

    class SqlHandler {

        public $mysqli;
        public $data;
        public $id;

        function __construct($ip, $user, $pass, $database) {
            $this->data = array();

            $this->mysqli = mysqli_connect($ip, $user, $pass, $database);

            if (mysqli_connect_errno('$this->mysqli')) {
                echo "Could not connect to database!";
                exit;
            }

        }

        function querry($sql, $read) {

            // Clear data on querry call from previous
            $this->data = array();
            
            // Run Querry
            $result = mysqli_query($this->mysqli, $sql);

            if ($result) {

                if (!$read) {
                    $this->id = $this->mysqli->insert_id;
                }

                if ($read) {
                    // If no rows exist return false
                    if ($result->num_rows == 0) {
                        mysqli_free_result($result);
                        return false;
                    }

                    // Place all of the rows in $data
                    while ($row = mysqli_fetch_assoc($result)) {
                        $arr = [];
                        
                        // Store in a 2D array accessed via column names
                        foreach ($row as $key => $item) {
                            $arr[$key] = $item;
                        }

                        $this->data[] = $arr;
                    }
                }

            } else {
                // Error check
                echo "Result error:" . $this->mysqli->error;
            }

            if ($read) {
                // Free result
                mysqli_free_result($result);
            }

            // If everything was succesful return true
            return true;
        }

        function querryMulti($sql) {

            // Clear data on querry call from previous
            $this->data = array();
            
            // Run Querry
            $result = mysqli_multi_query($this->mysqli, $sql);

            if (!$result) {
                // Error check
                echo "Result error:" . $this->mysqli->error;
            }
        }

        function close() {
            // Close conection
            mysqli_close($this->mysqli);
        }

    };

    /*$handler = new SqlHandler('localhost', 'root', '', 'ticket_stocker');
    $handler->querry("SELECT * FROM ticket");

    foreach ($handler->data as $item) {
        foreach($item as $itemer) {
            print($itemer);
        }
    }*/
?>
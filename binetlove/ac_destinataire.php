<?php
require('database.php');
if (isset($_GET['id'])) {
        $id = $_GET['id']; 
    }
if (isset($_GET['term'])) {
        $user_typed = $_GET['term']; 
    }
ac($dbh, $id, $user_typed);
?>
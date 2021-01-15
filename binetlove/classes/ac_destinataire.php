<?php
require('classes/database.php');
if (isset($_GET['term'])) {
        $user_typed = $_GET['term']; 
        var_dump($user_typed);
    }
ac($dbh, $user_typed);
?>
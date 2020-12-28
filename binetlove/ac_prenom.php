<?php
require('database.php');
if (isset($_GET['term'])) {
        $user_typed = $_GET['term']; 
    }
ac($dbh, 'prenom', $user_typed);
?>
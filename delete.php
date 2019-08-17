<?php
include("inc/header.php");

// if isset $_GET
// logic here to populate the page. 
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id_to_delete = intval($_GET['id']);
        $entry_to_delete = delete_entry($id_to_delete);
        if ($entry_to_delete) {
            echo "Successfully Deleted Entry</br>";
            echo "<a href='index.php'>Back</a>";
        }
    } else {
        header("location:index.php");
        die();
    }
}

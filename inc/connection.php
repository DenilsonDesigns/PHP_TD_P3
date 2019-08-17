    <!-- connection -->
    <?php
    // remove before submission
    ini_set("display_errors", "On");

    try {
        $db = new PDO("sqlite:./inc/journal.db");
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
    ?>
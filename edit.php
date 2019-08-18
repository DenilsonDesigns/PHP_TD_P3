<?php
include("inc/header.php");

// if isset $_GET
// logic here to populate the page. 
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_to_render = intval($_GET['id']);
    $entry_to_render = get_entry($id_to_render);
}

// if isset $_POST
// logic here to update db
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);

    if (empty($_POST['title'])) {
        $error_msg .= "Title Cannot Be Blank!</br>";
    }
    if (empty($_POST['date'])) {
        $error_msg .= "Must Include Date!</br>";
    }
    if (empty($_POST['timeSpent'])) {
        $error_msg .= "Please enter a value for time spent!</br>";
    }
    if (empty($_POST['whatILearned'])) {
        $error_msg .= "Please enter what you learned!</br>";
    }
    if (empty($_POST['ResourcesToRemember'])) {
        $error_msg .= "Please enter what you learned!</br>";
    }

    if (
        !empty($_POST['title'])
        && !empty($_POST['date'])
        && !empty($_POST['timeSpent'])
        && !empty($_POST['whatILearned'])
        && !empty($_POST['ResourcesToRemember'])
    ) {
        $updated = update_entry($id, $_POST['title'], $_POST['date'], $_POST['timeSpent'], $_POST['whatILearned'], $_POST['ResourcesToRemember'], $_POST['entryTags']);
        if ($updated) {
            header("location:index.php");
            die();
        }
    }
}


// if (!isset($_GET['id'])) {
//     header("location:index.php");
//     die();
// }


?>
<section>
    <div class="container">
        <div class="edit-entry">
            <h2>Edit Entry</h2>
            <?php
            $date = new DateTime($entry_to_render[0]['date']);
            $day = $date->format('d');
            $month = $date->format('m');
            $year = $date->format('Y');
            $date_form_val = $year . '-' . $month . '-' . $day;
            ?>
            <form action="edit.php" method="POST">
                <input type="hidden" name="id" id="hiddenField" value="<?php
                                                                        if (isset($_GET['id'])) {
                                                                            echo $_GET['id'];
                                                                        }
                                                                        ?>" />
                <label for="title">Title</label>
                <input id="title" type="text" name="title" value="<?php echo $entry_to_render[0]['title']; ?>"><br>
                <label for="date">Date</label>
                <input id="date" type="date" name="date" value="<?php echo $date_form_val; ?>"><br>
                <label for="time-spent"> Time Spent</label>
                <input id="time-spent" type="text" name="timeSpent" value="<?php echo $entry_to_render[0]['time_spent']; ?>"><br>
                <label for="what-i-learned">What I Learned</label>
                <textarea id="what-i-learned" rows="5" name="whatILearned">
                <?php echo $entry_to_render[0]['learned']; ?>
                </textarea>
                <label for="resources-to-remember">Resources to Remember</label>
                <textarea id="resources-to-remember" rows="5" name="ResourcesToRemember">
                <?php echo $entry_to_render[0]['resources']; ?>
                </textarea>
                <label for="entry-tags">Enter hashtags for entry (separated by comma)</label>
                <input value="<?php if ($entry_to_render[0]['tags']) {
                                    echo $entry_to_render[0]['tags'];
                                } ?>" type="text" id="entry-tags" name="entryTags"></input><br><br>
                <input type="submit" value="Publish Entry" class="button">
                <a href="#" class="button button-secondary">Cancel</a>
            </form>
        </div>
    </div>
</section>
<?php
include('inc/footer.php');
?>
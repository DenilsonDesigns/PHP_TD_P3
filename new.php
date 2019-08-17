<?php
include("inc/header.php");
$error_msg = '';
$added = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['title'])) {
        $error_msg .= "Please enter a title!</br>";
    }
    if (empty($_POST['date'])) {
        $error_msg .= "Please enter a date!</br>";
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
        $added = add_entry($_POST['title'], $_POST['date'], $_POST['timeSpent'], $_POST['whatILearned'], $_POST['ResourcesToRemember']);
    }
}

?>
<section>
    <div class="container">
        <div class="new-entry">
            <?php
            if ($added) {
                echo "Successfully Added Entry!</br>";
            }
            ?>
            <h2>New Entry</h2>
            <?php echo $error_msg; ?>
            <form action="new.php" method="POST">
                <label for="title"> Title</label>
                <input id="title" type="text" name="title"><br>
                <label for="date">Date</label>
                <input id="date" type="date" name="date"><br>
                <label for="time-spent"> Time Spent</label>
                <input id="time-spent" type="text" name="timeSpent"><br>
                <label for="what-i-learned">What I Learned</label>
                <textarea id="what-i-learned" rows="5" name="whatILearned"></textarea>
                <label for="resources-to-remember">Resources to Remember</label>
                <textarea id="resources-to-remember" rows="5" name="ResourcesToRemember"></textarea>
                <input type="submit" value="Publish Entry" class="button">
                <a href="#" class="button button-secondary">Cancel</a>
            </form>
        </div>
    </div>
</section>
<?php
include('inc/footer.php');
?>
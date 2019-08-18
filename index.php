<?php
include("inc/header.php");

try {
    $results = $db->query(
        "SELECT * FROM entries ORDER BY date ASC"
    );
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

$entries = $results->fetchAll(PDO::FETCH_ASSOC);

// var_dump($entries);
?>
<section>
    <div class="container">
        <div class="entry-list">
            <?php
            foreach ($entries as $entry) {
                $date = new DateTime($entry['date']);
                echo '
                <article>
                    <h2>
                    <a href="detail.php?id=' . $entry['id'] . '">'
                    . $entry['title'] . '</a>
                    </h2>
                    <time datetime="' . $entry['date'] . '">'
                    . $date->format('jS F Y') .
                    '</time>';
                echo '<div class="tags-div">';
                if ($entry['tags']) {
                    $string = explode(",", $entry['tags']);
                    foreach ($string as $word) {
                        echo "<p class='tags-inline'>#" . trim($word) . "</p>";
                    }
                }
                echo '</div>';

                echo '</article>';
            }
            ?>
        </div>
    </div>
</section>
<?php
include("inc/footer.php");
?>
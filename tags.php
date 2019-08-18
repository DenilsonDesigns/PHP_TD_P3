<?php
include("inc/header.php");

if (!isset($_GET['tag'])) {
    header("location:index.php");
    die();
}

$tag_to_search = $_GET['tag'];

try {
    $results = $db->query(
        "SELECT * FROM entries e WHERE e.tags LIKE '%$tag_to_search%'"
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
        <h2 class="tag-heading">Projects containing #<?php echo $tag_to_search; ?> tag</h2>
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
                        echo "<a href='tags.php?tag=" . trim($word) . "' class='tags-inline'>#" . trim($word) . "</a>";
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
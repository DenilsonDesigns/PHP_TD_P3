<?php
include("inc/header.php");

try {
    $results = $db->query(
        "SELECT * FROM entries"
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
                    '</time>
                </article>
                
                ';
            }
            ?>
        </div>
    </div>
</section>
<?php
include("inc/footer.php");
?>
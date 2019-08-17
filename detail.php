<?php
include("inc/header.php");

if (!isset($_GET['id'])) {
    header("location:index.php");
    die();
}

$id_to_render = intval($_GET['id']);


$entry_to_render = get_entry($id_to_render);

// var_dump($entry_to_render);
?>
<section>
    <div class="container">
        <div class="entry-list single">
            <article>
                <?php
                #DateTime::createFromFormat('j-M-Y', '15-Feb-2009');
                $date = new DateTime($entry_to_render[0]['date']);
                ?>
                <h1>The best day I’ve ever had</h1>
                <time datetime="<?php echo $entry_to_render[0]['date']; ?>">
                    <?php
                    echo $date->format('jS F Y');
                    ?>
                </time>
                <div class="entry">
                    <h3>Time Spent: </h3>
                    <p><?php
                        echo $entry_to_render[0]['time_spent'] . " hours";
                        ?></p>
                </div>
                <div class="entry">
                    <h3>What I Learned:</h3>
                    <p>
                        <?php
                        echo $entry_to_render[0]['learned'];
                        ?>

                    </p>
                </div>
                <div class="entry">
                    <h3>Resources to Remember:</h3>
                    <ul>
                        <li>
                            <?php
                            echo $entry_to_render[0]['resources'];
                            ?>
                        </li>
                        <!-- <li><a href="">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="">Cras accumsan cursus ante, non dapibus tempor</a></li>
                        <li>Nunc ut rhoncus felis, vel tincidunt neque</li>
                        <li><a href="">Ipsum dolor sit amet</a></li> -->
                    </ul>
                </div>
            </article>
        </div>
    </div>
    <div class="edit">
        <p><a href="edit.php?id=<?php echo $id_to_render; ?>">Edit Entry</a></p>
        <p><a id="delete-button" href="delete.php?id=<?php echo $id_to_render; ?>">Delete Entry</a></p>
    </div>
</section>
<?php
include("inc/footer.php");
?>
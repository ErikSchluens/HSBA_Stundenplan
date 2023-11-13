<?php
    include_once ('header.php');
?>
        <title>Startseite</title>
        <h2 style="margin: 0.5%">Willkommen, <?php echo $username ?></h2>

<?php
if ($_SESSION['user_id'] == 24) {
    // Display content for user group 24 (Students)
    echo '<div class="btn-group btn-group-lg">';
    echo '<div class="text1"><a href="Excursion.php">+</a></div>';
    echo '<div class="text2"><a href="WBÜ.php">+</a></div>';
    echo '</div>';
    echo '<p1 class="p2">Exkursionszuordnung</p1>';
    echo '<p1 class="p3">WBÜ Zuordnung</p1>';
}
if ($_SESSION['user_id'] == 22 || $_SESSION['user_id'] == 23) {
    // Display content for user group 22 and 23 (Administration)
    echo '<div class="btn-group btn-group-lg">';
    echo '<div class="text1"><a href="Stundenplan.php">+</a></div>';
    echo '</div>';
    echo '<p1 class="p1">Stundenplan erstellen</p1>';
}
// Display content for user group 1 to 21 (Lecturers)
$allowed_user_ids = range(1, 21);
if (in_array($_SESSION['user_id'], $allowed_user_ids)) {
    // Display content for user group 1 to 21
    echo '<div class="new-div"><a href="#">TBD</a></div>';
}
?>

        </body>
        <div style="height: 170px;"></div>

<?php
include_once('footer.php');
?>

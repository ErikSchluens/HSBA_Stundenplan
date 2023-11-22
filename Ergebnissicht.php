<?php include_once ('header.php');
//if you´re not login you will be redirected to the Login page
if ($_SESSION['user_id'] == null) {
    header('Location:Login.php');
}
?>

<?php
//Connection to the Database
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'Stundenplan'; // Hier sollte der Name deiner Datenbank stehen
$db_port = 8889;

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_db, $db_port);

if ($mysqli->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $mysqli->connect_error);
}

?>

<div class="body_box">

    <h2 style="margin: 0.5%" >Hallo <?php echo $username ?>, das sind deine Ergebnisse!</h2>

    <div style="margin-left: 7%; margin-top: 2%; margin-bottom: 2%;">
        <h5> Wahlergebnisse </h5>
        <div> Hier siehst du in welcher Exkursion du bist </div>

    </div>
    <div class="homepage_optioncontainer">
        <?php
        $stmt = $mysqli->prepare("SELECT * FROM Excursion_Input WHERE username = ?");
        $stmt ->bind_param("s", $username);
        $stmt ->execute();
        $result = $stmt ->get_result()->fetch_assoc();
        //save the user num to use it in later sql queries
        $user_num = $result["num"];

        ?>
    </div>



</div>
<?php
// Verbindung schließen
$mysqli->close();
?>
<?php include_once('footer.php') ?>


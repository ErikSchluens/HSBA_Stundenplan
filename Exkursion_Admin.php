<?php include_once ('header.php');
//if you´re not login you will be redirected to the Login page
if ($_SESSION['user_id'] == null) {
    header('Location:Login.php');
}
//if you´re logged in with a user group other than admin you will be redirected to the homepage
$forbiddenrange = range(1, 21);
if ($_SESSION['user_id'] >=24 || in_array($_SESSION['user_id'], $forbiddenrange) ){
    header('Location:Gui.php');
}
?>

<?php
// Verbindung der Datenbank
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

    <h2 style="margin: 0.5%" >Hallo <?php echo $username ?>!</h2>

    <?php
    //Information required to establish connection
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $db_host = '127.0.0.1';
        $db_user = 'root';
        $db_password = 'root';
        $db_db = 'Stundenplan'; // Hier sollte der Name deiner Datenbank stehen
        $db_port = 8889;

        // Establish connection to DB
        $conn = new mysqli($db_host, $db_user, $db_password, $db_db, $db_port);

        if ($conn->connect_error) {
            die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
        }

        //information that needs to be saved in DB
        $numberofstudents = $_POST["numberofstudents"];

        //define the name of constraint
        $postname = "numstudents_excursion";

        // Check if the variable already exists in the table
        $checkQuery = "SELECT * FROM `Constraints` WHERE Name = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("s", $postname);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Update existing record if the username already exists
            $updateQuery = "UPDATE `Constraints` SET Value=? WHERE name=?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("ss", $numberofstudents,  $postname);

            if ($updateStmt->execute()) {
                echo "<p style='text-align: center; margin-top: 4%; font-weight: bolder'>"
                    . "Deine Eingabe wurde erfolgreich aktualisiert" . "</p>";
            } else {
                echo "<p style='text-align: center; margin-top: 4%; font-weight: bolder'>"
                    . "Fehler beim Einfügen in die Datenbank" . "</p>" . $updateStmt->error;
            }
            $updateStmt->close();
        } else {
            // Insert a new record if the username doesn't exist
            $insertQuery = "INSERT INTO `Constraints` (Name, Value) VALUES (?, ?)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("ss", $postname, $numberofstudents);

            if ($insertStmt->execute()) {
                echo "<p style='text-align: center; margin-top: 4%; font-weight: bolder'>"
                    . "Die Nebenbedingung wurde übergeben" . "</p>";
            } else {
                echo "<p style='text-align: center; margin-top: 4%; font-weight: bolder'>"
                    . "Fehler beim Einfügen in die Datenbank" . "</p>" . $insertStmt->error;
            }

            $insertStmt->close();
        }

    }

    ?>

    <div style="margin-left: 7%; margin-top: 2%; margin-bottom: 2%;">
        <h5> Wahlergebnisse </h5>
        <div> In der untenstehenden Tabelle sind die Wahlergebnisse aller Studierenden zu sehen. </div>

    </div>
    <div class="homepage_optioncontainer">
        <table style="width:90%">
            <tr style="background-color: rgba(3, 45, 87, 0.27);">
                <td class="table_cell">
                    Username
                </td>
                <td class="table_cell">
                    Hamburg
                </td>
                <td class="table_cell">
                    Lissabon
                </td>
                <td class="table_cell">
                    Athen
                </td>
                <td class="table_cell">
                    Bilbao
                </td>
                <td class="table_cell">
                    Bordeaux
                </td>
                <td class="table_cell">
                    Limassol
                </td>
            </tr>
            <!-- Für jede vorhande Wahl wird eine Tabellezeile ausgegeben -->
            <?php
            // SQL-Abfrage für Daten ausführen
            $dataQuery = "SELECT * FROM Excursion_Zwischentabelle";
            $dataResult = $mysqli->query($dataQuery);
            foreach($dataResult as $row) {
                ?>
                <!-- In die Tabellenzeilen werden die Inhalte aus dem SQL übernommen -->
                <tr>
                    <td class="table_cell"><?=$row['username']?></td>
                    <td class="table_cell"><?=$row['Hamburg']?></td>
                    <td class="table_cell"><?=$row['Lissabon']?></td>
                    <td class="table_cell"><?=$row['Athen']?></td>
                    <td class="table_cell"><?=$row['Bilbao']?></td>
                    <td class="table_cell"><?=$row['Bordeaux']?></td>
                    <td class="table_cell"><?=$row['Limassol']?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>

    <!-- Nach dem man sieht wie viele Wahlen es gibt, kann man die Anzahl der Studenten pro Exkursion festelegen -->
    <div class="homepage_optioncontainer" style="margin-top: 2%">
        <h5> 1. Gib die maximale Anzahl der Studenten pro Exkursion an</h5>
        <div style="align-items: center; justify-content: center; text-align: center;">
            <form method="post">
                <label for="number">Maximal-Anzahl der Studenten pro Exkursion:</label>
                <input type="number" id="numberofstudents" name="numberofstudents" required min="1"> <!--min gibt kleinste Zahl an. -->
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <!-- Mit diesem Button kann man die Python scripte starten-->
    <div class="homepage_optioncontainer" style="margin-top: 2%">
        <div style="align-items: center; justify-content: center; text-align: center;">
            <h5> 2. Klicke auf diesen Button, um die Python Scripte zu starten  </h5>
            <div> Yeah yeah yeah </div>
            <button type="submit" name="submit" class="btn btn-dark" style="background-color: #032d57; margin-top: 2%"> Start</button>
        </div>
    </div>

    <div style="margin-left: 7%; margin-top: 2%; margin-bottom: 2%;">
        <h5> Exkursions-Zuteilung
        </h5>
        <div> In der untenstehenden Tabelle ist die optimale Zuteilung für die vorliegenden Exkursionen zu sehen.
        </div>
    </div>
    <div class="homepage_optioncontainer">
        <table style="width:90%">
            <tr style="background-color: rgba(3, 45, 87, 0.27);">
                <td class="table_cell">
                    Variable
                </td>
                <td class="table_cell">
                    WBÜ
                </td>
            </tr>
            <!-- Für jede vorhande Wahl wird eine Tabellezeile ausgegeben -->
            <?php
            // SQL-Abfrage für Daten ausführen
            $dataQuery = "SELECT * FROM [Tabellenname]";
            $dataResult = $mysqli->query($dataQuery);
            foreach($dataResult as $row) {
                ?>
                <!-- In die Tabellenzeilen werden die Inhalte aus dem SQL übernommen -->
                <tr>
                    <td class="table_cell"><?=$row['variable']?></td>
                    <td class="table_cell"><?=$row['wert']?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>

</div>
<?php
// Verbindung schließen
$mysqli->close();
?>
<?php include_once('footer.php') ?>

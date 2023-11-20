<?php include_once ('header.php') ?>

<?php
// Verbindung der Datenbank
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'TimeTableknowledge'; // Hier sollte der Name deiner Datenbank stehen
$db_port = 8889;

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_db, $db_port);

if ($mysqli->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $mysqli->connect_error);
}
?>

<div class="body_box">

    <h2 style="margin: 0.5%" >Hallo <?php echo $username ?>!</h2>

    <div class="homepage_optioncontainer" style="margin-top: 2%">
         <div style="align-items: center; justify-content: center; text-align: center;">
            <h5> Sample Text, um Exkursions Verteilung zu starten - wuh! </h5>
            <div> Yeah yeah yeah </div>
            <button type="submit" name="submit" class="btn btn-dark" style="background-color: #032d57; margin-top: 2%"> Start</button>
        </div>
    </div>

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

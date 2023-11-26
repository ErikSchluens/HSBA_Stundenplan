<?php include_once ('header.php');
//if you´re not logged in you will be redirected to the Login page
if ($_SESSION['user_id'] ==null ) {
    header('Location:Login.php');
    }
//if you´re logged in with a user group other than admin you will be redirected to the homepage
$forbiddenrange = range(1, 21);
if ($_SESSION['user_id'] >=24 || in_array($_SESSION['user_id'], $forbiddenrange) ){
    header('Location:Gui.php');
    }
?>

<div class="body_box">

    <h2 style="margin: 0.5%" >Hallo <?php echo $username ?>!</h2>

    <div class="homepage_optioncontainer" style="margin-top: 2%">
         <div style="align-items: center; justify-content: center; text-align: center;">
            <h5> Sample Text, um WBÜ Verteilung zu starten - wuh! </h5>
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
                Spanisch
            </td>
            <td class="table_cell">
                Communication
            </td>
            <td class="table_cell">
                Verhandlungsführung
            </td>
            <td class="table_cell">
                Selfempowerment
            </td>
            <td class="table_cell">
                Presentation skills
            </td>
        </tr>
        <!-- Für jede vorhande Wahl wird eine Tabellezeile ausgegeben -->
        <?php
        // SQL-Abfrage für Daten ausführen
        $dataQuery = "SELECT * FROM WBÜ_zwischentabelle";
        $dataResult = $mysqli->query($dataQuery);
        foreach($dataResult as $row) {
            ?>
            <!-- In die Tabellenzeilen werden die Inhalte aus dem SQL übernommen -->
            <tr>
                <td class="table_cell"><?=$row['username']?></td>
                <td class="table_cell"><?=$row['Spanisch']?></td>
                <td class="table_cell"><?=$row['Communication']?></td>
                <td class="table_cell"><?=$row['Verhandlungsführung']?></td>
                <td class="table_cell"><?=$row['Selfempowerment']?></td>
                <td class="table_cell"><?=$row['presentation_skills']?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>

    <div style="margin-left: 7%; margin-top: 2%; margin-bottom: 2%;">
        <h5> WBÜ-Zuteilung
        </h5>
        <div> In der untenstehenden Tabelle ist die optimale Zuteilung für die vorliegenden WBÜs zu sehen.
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
            $dataQuery = "SELECT * FROM WBÜ_Output";
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

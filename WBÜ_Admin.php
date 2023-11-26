<?php
//This includes the header to the WBÜ-Admin page.
include_once ('header.php');
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
<!-- This is where the body of the page begins. -->
<div class="body_box">
    <h2 style="margin: 0.5%" >Hallo <?php echo $username ?>!</h2>
    <!-- Div with button to start the WBÜ distribution. At the moment the button does not work yet. The python script must be started manually.  -->
    <div class="homepage_optioncontainer" style="margin-top: 2%;">
        <div class="distribution_activator">
            <h5> WBÜ-Verteilung </h5>
            <div> Klicke auf Start, um die Studierenden optimal auf das aktuelle WBÜ-Angebot zu verteilen. </div>
            <button type="submit" name="submit" class="btn btn-dark" style="background-color: #032d57; margin-top: 2%">Start</button>
        </div>
    </div>
    <!-- Table with all the current election results of the students.  -->
    <div style="margin-left: 7%; margin-top: 2%;">
        <h5> Wahlergebnisse </h5>
        <div> In der untenstehenden Tabelle sind die aktuellen Wahlergebnisse aller Studierenden zu sehen. </div>
    </div>
    <div class="homepage_optioncontainer">
        <table class="distribution_table">
            <tr style="background-color: rgba(3, 45, 87, 0.27);">
                <td class="table_cell">
                    Username
                </td>
                <td class="table_cell">
                    Spanisch
                </td>
                <td class="table_cell">
                    Kommunikation
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
            <!-- A table row is output for each existing choice stored in the database -->
            <?php
            // SQL query to pull the data from the table in which the election results are stored (WBÜ-zwischentabelle).
            $dataQuery = "SELECT * FROM WBÜ_zwischentabelle";
            $dataResult = $mysqli->query($dataQuery);
            foreach($dataResult as $row) {
                ?>
                <!-- The contents from the SQL are transferred to the table rows -->
                <tr>
                    <td class="table_cell"><?=$row['username']?></td>
                    <td class="table_cell"><?=$row['Spanisch']?></td>
                    <td class="table_cell"><?=$row['kommunikation']?></td>
                    <td class="table_cell"><?=$row['Verhandlungsführung']?></td>
                    <td class="table_cell"><?=$row['Selfempowerment']?></td>
                    <td class="table_cell"><?=$row['presentation_skills']?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <!-- Table with the optimal distribution of students to the current WBÜs. -->
    <div style="margin-left: 7%; margin-bottom: 2%;">
        <h5> WBÜ-Zuteilung
        </h5>
        <div> In der untenstehenden Tabelle ist die optimale Zuteilung von Studierenden zu dem vorliegenden WBÜ-Angebot zu sehen.
        </div>
    </div>
    <div class="homepage_optioncontainer">
        <table class="distribution_table">
            <tr style="background-color: rgba(3, 45, 87, 0.27);">
                <td class="table_cell">
                    Variable
                </td>
                <td class="table_cell">
                    WBÜ
                </td>
            </tr>
            <!-- A table row is output for each existing choice stored in the database -->
            <?php
            // SQL query to pull the data from the table in which the optimal distribution results from the python algorithm are stored (WBÜ_Output).
            $dataQuery = "SELECT * FROM WBÜ_Output";
            $dataResult = $mysqli->query($dataQuery);
            foreach($dataResult as $row) {
                ?>
                <!-- The contents from the SQL are transferred to the table rows -->
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
//This includes the footer to the WBÜ-Admin page.
include_once('footer.php')
?>

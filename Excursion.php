<?php include_once ('header.php') ?>
    <style>
        table {
            width: 15%;
            border-collapse: collapse;
            margin-left: 2%;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:nth-child(odd) {
            background-color: #ffffff;
        }
    </style>
<?php
include_once('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = '127.0.0.1';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'Stundenplan'; // Hier sollte der Name deiner Datenbank stehen
    $db_port = 8889;

    // Verbindung zur Datenbank herstellen
    $conn = new mysqli($db_host, $db_user, $db_password, $db_db, $db_port);

    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    $dropdown1 = $_POST["dropdown1"];
    $dropdown2 = $_POST["dropdown2"];
    $dropdown3 = $_POST["dropdown3"];
    $dropdown4 = $_POST["dropdown4"];
    $dropdown5 = $_POST["dropdown5"];

    // SQL-Query, um die ausgewählten Werte in die Datenbank einzufügen
    $sql = "INSERT INTO Excursion_Input (username, 1Wahl, 2Wahl, 3Wahl, 4Wahl, 5Wahl) 
            VALUES ('$username', '$dropdown1', '$dropdown2', '$dropdown3', '$dropdown4', '$dropdown5')";

    if ($conn->query($sql) === TRUE) {
        echo "Danke, deine Wahl wurde erfolgreich abgegeben.";
    } else {
        echo "Fehler beim Einfügen in die Datenbank: " . $conn->error;
    }

    // Datenbankverbindung schließen
    $conn->close();
}
var_dump($_SESSION);
?>

    <title>Exkursion</title>
    <h2 style="margin: 0.5%">Exkursion wählen</h2>

        <h5 style="margin-left: 2.2%; margin-top: 5%">Verfügbare Städte</h5>
            <table>
                <th>Städte</th>
                <tr><td>Hamburg</td></tr>
                <tr><td>Lissabon</td></tr>
                <tr><td>Athen</td></tr>
                <tr><td>Bilbao</td></tr>
                <tr><td>Bordeux</td></tr>
                <tr><td>Albanien</td></tr>
            </table>


    <form method="post" style="margin-left: 10%">

        <div style="margin-left: 16%; margin-top: -14%; position: absolute">1. Wahl</div>
        <select name="dropdown1" style="position: absolute; margin-left: 15%;margin-top: -12%">
            <option value="Hamburg">Hamburg</option>
            <option value="Lissabon">Lissabon</option>
            <option value="Athen">Athen</option>
            <option value="Bilbao">Bilbao</option>
            <option value="Bordeux">Bordeux</option>
            <option value="Albanien">Albanien</option>
        </select>

        <div style="margin-left: 26%; margin-top: -14%; position: absolute">2. Wahl</div>
        <select name="dropdown2" style="position: absolute; margin-left: 25%;margin-top: -12%">
            <option value="Hamburg">Hamburg</option>
            <option value="Lissabon">Lissabon</option>
            <option value="Athen">Athen</option>
            <option value="Bilbao">Bilbao</option>
            <option value="Bordeux">Bordeux</option>
            <option value="Albanien">Albanien</option>
        </select>

        <div style="margin-left: 36%; margin-top: -14%; position: absolute">3. Wahl</div>
        <select name="dropdown3" style="position: absolute; margin-left: 35%;margin-top: -12%">
            <option value="Hamburg">Hamburg</option>
            <option value="Lissabon">Lissabon</option>
            <option value="Athen">Athen</option>
            <option value="Bilbao">Bilbao</option>
            <option value="Bordeux">Bordeux</option>
            <option value="Albanien">Albanien</option>
        </select>

        <div style="margin-left: 46%; margin-top: -14%; position: absolute">4. Wahl</div>
        <select name="dropdown4" style="position: absolute; margin-left: 45%;margin-top: -12%">
            <option value="Hamburg">Hamburg</option>
            <option value="Lissabon">Lissabon</option>
            <option value="Athen">Athen</option>
            <option value="Bilbao">Bilbao</option>
            <option value="Bordeux">Bordeux</option>
            <option value="Albanien">Albanien</option>
        </select>

        <div style="margin-left: 56%; margin-top: -14%; position: absolute">5. Wahl</div>
        <select name="dropdown5" style="position: absolute; margin-left: 55%;margin-top: -12%">
            <option value="Hamburg">Hamburg</option>
            <option value="Lissabon">Lissabon</option>
            <option value="Athen">Athen</option>
            <option value="Bilbao">Bilbao</option>
            <option value="Bordeux">Bordeux</option>
            <option value="Albanien">Albanien</option>
        </select>

        <input type="submit" name="submit" class="btn btn-dark" style="background-color: #032d57; margin-top: -14%; margin-left: 75%">
    </form>

            <div style="height: 500px; width: 100%;"></div>
<?php include_once('footer.php')?>

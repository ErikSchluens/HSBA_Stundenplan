<?php include_once ('header.php') ?>
    <style>
        table {
            width: 15%;
            border-collapse: collapse;
            margin-left: 2%;
            margin-top: 7%;
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

    // Check if the username already exists in the table
    $checkQuery = "SELECT * FROM WBÜ_Input WHERE username = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("s", $username);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Update existing record if the username already exists
        $updateQuery = "UPDATE WBÜ_Input SET wahl1=?, wahl2=?, wahl3=?, wahl4=?, wahl5=? WHERE username=?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("ssssss", $dropdown1, $dropdown2, $dropdown3, $dropdown4, $dropdown5, $username);

        if ($updateStmt->execute()) {
            echo "<p style='position: absolute;margin-left: 43%;margin-top: 8%;'>" . "Deine Wahl wurde erfolgreich aktualisiert" . "</p>";
        } else {
            echo "<p style='position: absolute;margin-left: 43%;margin-top: 8%;'>"
                . "Fehler beim Einfügen in die Datenbank" . "</p>" . $updateStmt->error;
        }
        $updateStmt->close();
    } else {
        // Insert a new record if the username doesn't exist
        $insertQuery = "INSERT INTO WBÜ_Input (username, wahl1, wahl2, wahl3, wahl4, wahl5) VALUES (?, ?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("ssssss", $username, $dropdown1, $dropdown2, $dropdown3, $dropdown4, $dropdown5);

        if ($insertStmt->execute()) {
            echo "<p style='position: absolute;margin-left: 43%;margin-top: 8%;'>" . "Danke für deine Wahl" . "</p>";
        } else {
            echo "<p style='position: absolute;margin-left: 43%;margin-top: 8%;'>"
                . "Fehler beim Einfügen in die Datenbank" . "</p>" . $insertStmt->error;
        }

        $insertStmt->close();
    }

}
?>
    <title>WBÜ</title>

    <h2 style="margin: 0.5%">Bitte wähle deine WBÜ Kurse, <?php echo $username ?></h2>
    <body>

    <table>
        <th>Verfügbare Kurse</th>
        <tr><td>Spanisch</td></tr>
        <tr><td>Selfempowerment</td></tr>
        <tr><td>Presentation Skills</td></tr>
        <tr><td>Verhandlungsführung</td></tr>
        <tr><td>Kommunikation</td></tr>
    </table>

    <form method="post" style="margin-left: 10%">

        <div style="margin-left: 10%; margin-top: -14%; position: absolute">Wahl 1</div>
        <select name="dropdown1" style="position: absolute; margin-left: 10%;margin-top: -12%">
            <option value="">Keinen Kurs</option>
            <option value="spanisch">Spanisch</option>
            <option value="selfempowerment">Selfempowerment</option>
            <option value="presentation_skills">Presentation Skills</option>
            <option value="verhandlungsführung">Verhandlungsführung</option>
            <option value="kommunikation">Kommunikation</option>
        </select>

        <div style="margin-left: 22%; margin-top: -14%; position: absolute">Wahl 2</div>
        <select name="dropdown2" style="position: absolute; margin-left: 22%;margin-top: -12%">
            <option value="">Keinen Kurs</option>
            <option value="spanisch">Spanisch</option>
            <option value="selfempowerment">Selfempowerment</option>
            <option value="presentation_skills">Presentation Skills</option>
            <option value="verhandlungsführung">Verhandlungsführung</option>
            <option value="kommunikation">Kommunikation</option>
        </select>

        <div style="margin-left: 34%; margin-top: -14%; position: absolute">Wahl 3</div>
        <select name="dropdown3" style="position: absolute; margin-left: 34%;margin-top: -12%">
            <option value="">Keinen Kurs</option>
            <option value="spanisch">Spanisch</option>
            <option value="selfempowerment">Selfempowerment</option>
            <option value="presentation_skills">Presentation Skills</option>
            <option value="verhandlungsführung">Verhandlungsführung</option>
            <option value="kommunikation">Kommunikation</option>
        </select>

        <div style="margin-left: 46%; margin-top: -14%; position: absolute">Wahl 4</div>
        <select name="dropdown4" style="position: absolute; margin-left: 46%;margin-top: -12%">
            <option value="">Keinen Kurs</option>
            <option value="spanisch">Spanisch</option>
            <option value="selfempowerment">Selfempowerment</option>
            <option value="presentation_skills">Presentation Skills</option>
            <option value="verhandlungsführung">Verhandlungsführung</option>
            <option value="kommunikation">Kommunikation</option>
        </select>

        <div style="margin-left: 58%; margin-top: -14%; position: absolute">Wahl 5</div>
        <select name="dropdown5" style="position: absolute; margin-left: 58%;margin-top: -12%">
            <option value="">Keinen Kurs</option>
            <option value="spanisch">Spanisch</option>
            <option value="selfempowerment">Selfempowerment</option>
            <option value="presentation_skills">Presentation Skills</option>
            <option value="verhandlungsführung">Verhandlungsführung</option>
            <option value="kommunikation">Kommunikation</option>
        </select>

        <input type="submit" name="submit" class="btn btn-dark" style="background-color: #032d57; margin-top: -14.3%; margin-left: 78%">
    </form>

    <div style="height: 250px; width: 100%;"></div>

<?php include_once('footer.php') ?>
<?php include_once ('header.php');// Integration of the header
// If you´re not logged in you will be redirected to the Login page
if ($_SESSION['user_id'] ==null ) {
    header('Location:Login.php');
}
?>
<!-- Right here I style the table, due to not working in the CSS I decided to style it in File-->
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
// Connection to our database is established, If it fails we get a error message
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = '127.0.0.1';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'Stundenplan';
    $db_port = 8889;

    $conn = new mysqli($db_host, $db_user, $db_password, $db_db, $db_port);

    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }
    // Right here I give every dropdown a variable, so I can use them in SQL Statement to insert Data in the Database
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
<!-- Begin of the website, where the specific user is adressed -->
<h2 style="margin: 0.5%">Bitte wähle deine WBÜ Kurse, <?php echo $username ?></h2>
<body>
<!-- Table where all selectable courses are listed -->
<table>
    <th>Verfügbare Kurse</th>
    <tr><td>Spanisch</td></tr>
    <tr><td>Selfempowerment</td></tr>
    <tr><td>Presentation Skills</td></tr>
    <tr><td>Verhandlungsführung</td></tr>
    <tr><td>Kommunikation</td></tr>
</table>

<!-- Form for the Dropdowns is created -->
<form method="post" style="margin-left: 10%" onsubmit="return validateForm()">

    <!-- Dropdown 1 will be there everytime in the first place -->
    <div style="margin-left: 10%; margin-top: -14%; position: absolute">Wahl 1</div>
    <select name="dropdown1" id="dropdown1" onchange="showDropdown(1)" style="position: absolute; margin-left: 10%;margin-top: -12%">
        <option value="">Keinen Kurs</option>
        <option value="spanisch">Spanisch</option>
        <option value="selfempowerment">Selfempowerment</option>
        <option value="presentation_skills">Presentation Skills</option>
        <option value="verhandlungsführung">Verhandlungsführung</option>
        <option value="kommunikation">Kommunikation</option>
    </select>

    <!-- Dropdown 2-5 will only be shown If the Dropdown before was selected -->
    <div style="margin-left: 22%; margin-top: -14%; position: absolute">Wahl 2</div>
    <select name="dropdown2" id="dropdown2" style="position: absolute; margin-left: 22%;margin-top: -12%">
        <option value="">Keinen Kurs</option>
        <option value="spanisch">Spanisch</option>
        <option value="selfempowerment">Selfempowerment</option>
        <option value="presentation_skills">Presentation Skills</option>
        <option value="verhandlungsführung">Verhandlungsführung</option>
        <option value="kommunikation">Kommunikation</option>
    </select>

    <div style="margin-left: 34%; margin-top: -14%; position: absolute">Wahl 3</div>
    <select name="dropdown3" id="dropdown3" style="position: absolute; margin-left: 34%;margin-top: -12%">
        <option value="">Keinen Kurs</option>
        <option value="spanisch">Spanisch</option>
        <option value="selfempowerment">Selfempowerment</option>
        <option value="presentation_skills">Presentation Skills</option>
        <option value="verhandlungsführung">Verhandlungsführung</option>
        <option value="kommunikation">Kommunikation</option>
    </select>

    <div style="margin-left: 46%; margin-top: -14%; position: absolute">Wahl 4</div>
    <select name="dropdown4" id="dropdown4" style="position: absolute; margin-left: 46%;margin-top: -12%">
        <option value="">Keinen Kurs</option>
        <option value="spanisch">Spanisch</option>
        <option value="selfempowerment">Selfempowerment</option>
        <option value="presentation_skills">Presentation Skills</option>
        <option value="verhandlungsführung">Verhandlungsführung</option>
        <option value="kommunikation">Kommunikation</option>
    </select>

    <div style="margin-left: 58%; margin-top: -14%; position: absolute">Wahl 5</div>
    <select name="dropdown5" id="dropdown5" style="position: absolute; margin-left: 58%;margin-top: -12%">
        <option value="">Keinen Kurs</option>
        <option value="spanisch">Spanisch</option>
        <option value="selfempowerment">Selfempowerment</option>
        <option value="presentation_skills">Presentation Skills</option>
        <option value="verhandlungsführung">Verhandlungsführung</option>
        <option value="kommunikation">Kommunikation</option>
    </select>
    <!-- Button to submit results to the database -->
    <input type="submit" name="submit" class="btn btn-dark" style="background-color: #032d57; margin-top: -14.3%; margin-left: 78%">
</form>
<!-- This is just a placeholder-->
<div style="height: 250px; width: 100%;"></div>

<?php include_once('footer.php') ?> <!-- Integration of the footer -->
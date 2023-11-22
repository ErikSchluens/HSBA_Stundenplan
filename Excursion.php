<?php include_once ('header.php');// Integration of the header
// If you´re not logged in you will be redirected to the Login page
if ($_SESSION['user_id'] ==null ) {
    header('Location:Login.php');
    }
    ?>
    <!-- Styling of the table -->
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

    $dropdown1 = $_POST["dropdown1"];
    $dropdown2 = $_POST["dropdown2"];
    $dropdown3 = $_POST["dropdown3"];
    $dropdown4 = $_POST["dropdown4"];
    $dropdown5 = $_POST["dropdown5"];

    // Check if the username already exists in the table
    $checkQuery = "SELECT * FROM Excursion_Input WHERE username = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("s", $username);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Update existing record if the username already exists
        $updateQuery = "UPDATE Excursion_Input SET 1wahl=?, 2wahl=?, 3wahl=?, 4wahl=?, 5wahl=? WHERE username=?";
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
        $insertQuery = "INSERT INTO Excursion_Input (username, 1wahl, 2wahl, 3wahl, 4wahl, 5wahl) VALUES (?, ?, ?, ?, ?, ?)";
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

    <title>Exkursion</title>

    <!-- Begin of the website, where the specific user is adressed -->
    <h2 style="margin: 0.5%">Bitte wähle deine Exkursion, <?php echo $username ?></h2>
    <!-- Table which shows which cities are selectable -->
    <h5 style="margin-left: 2.2%; margin-top: 5%">Verfügbare Städte</h5>
    <table>
        <th>Städte</th>
        <tr><td>Hamburg</td></tr>
        <tr><td>Lissabon</td></tr>
        <tr><td>Athen</td></tr>
        <tr><td>Bilbao</td></tr>
        <tr><td>Bordeaux</td></tr>
        <tr><td>Limassol</td></tr>
    </table>

    <!-- Form for the Dropdowns is created -->
    <form method="post" style="margin-left: 10%">

        <!-- Dropdown 1 will be there everytime in the first place -->
        <div style="margin-left: 10%; margin-top: -14%; position: absolute">1. Wahl</div>
        <select name="dropdown1" id="dropdown1" onchange="showDropdown(1)" style="position: absolute; margin-left: 10%;margin-top: -12%">
            <option value="">Keine Stadt ausgewählt</option>
            <option value="Hamburg">Hamburg</option>
            <option value="Lissabon">Lissabon</option>
            <option value="Athen">Athen</option>
            <option value="Bilbao">Bilbao</option>
            <option value="Bordeaux">Bordeaux</option>
            <option value="Limassol">Limassol</option>
        </select>

        <!-- Dropdown 2-5 will only be shown If the Dropdown before was selected -->
        <div style="margin-left: 23%; margin-top: -14%; position: absolute">2. Wahl</div>
        <select name="dropdown2" id="dropdown2" style="position: absolute; margin-left: 23%;margin-top: -12%">
            <option value="">Keine Stadt ausgewählt</option>
            <option value="Hamburg">Hamburg</option>
            <option value="Lissabon">Lissabon</option>
            <option value="Athen">Athen</option>
            <option value="Bilbao">Bilbao</option>
            <option value="Bordeaux">Bordeaux</option>
            <option value="Limassol">Limassol</option>
        </select>

        <div style="margin-left: 35.5%; margin-top: -14%; position: absolute">3. Wahl</div>
        <select name="dropdown3" id="dropdown3" style="position: absolute; margin-left: 35.5%;margin-top: -12%">
            <option value="">Keine Stadt ausgewählt</option>
            <option value="Hamburg">Hamburg</option>
            <option value="Lissabon">Lissabon</option>
            <option value="Athen">Athen</option>
            <option value="Bilbao">Bilbao</option>
            <option value="Bordeaux">Bordeaux</option>
            <option value="Limassol">Limassol</option>
        </select>

        <div style="margin-left: 48%; margin-top: -14%; position: absolute">4. Wahl</div>
        <select name="dropdown4" id="dropdown4" style="position: absolute; margin-left: 48%;margin-top: -12%">
            <option value="">Keine Stadt ausgewählt</option>
            <option value="Hamburg">Hamburg</option>
            <option value="Lissabon">Lissabon</option>
            <option value="Athen">Athen</option>
            <option value="Bilbao">Bilbao</option>
            <option value="Bordeaux">Bordeaux</option>
            <option value="Limassol">Limassol</option>
        </select>

        <div style="margin-left: 60.5%; margin-top: -14%; position: absolute">5. Wahl</div>
        <select name="dropdown5" id="dropdown5" style="position: absolute; margin-left: 60.5%;margin-top: -12%">
            <option value="">Keine Stadt ausgewählt</option>
            <option value="Hamburg">Hamburg</option>
            <option value="Lissabon">Lissabon</option>
            <option value="Athen">Athen</option>
            <option value="Bilbao">Bilbao</option>
            <option value="Bordeaux">Bordeaux</option>
            <option value="Limassol">Limassol</option>
        </select>

        <!-- Button to submit results to the database -->
        <input type="submit" name="submit" class="btn btn-dark" style="background-color: #032d57; margin-top: -14%; margin-left: 81%">
    </form>
    <!-- This is just a placeholder-->
    <div style="height: 250px; width: 100%;"></div>
<?php include_once('footer.php')?> <!-- Integration of the footer-->

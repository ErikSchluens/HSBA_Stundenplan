<!-- Einbindung des Headers -->
<?php include_once('header.php'); ?>
<!-- Beginn Content -->
<?php

// Definierung der username Variable
$username = (isset($_REQUEST['username']) && !empty($_REQUEST['username'])) ? $_REQUEST['username'] : null;
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

// If-Abfrage, wenn der Login-Knopf gedrückt wird
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hier findet die Abfrage von dem Username aus der Datenbank statt
    $stmt = $mysqli->prepare("SELECT * FROM LogIn WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();



    // If-Abfrage, ob der User in der Datenbank vorhanden ist, falls nicht, schlägt der Login fehl
    if (empty($result)) {
        echo "Login fehlgeschlagen1";
    } else {
        // Nun wird das Passwort überprüft
        $passwordHashed = password_hash($result["password"], PASSWORD_BCRYPT);

        $checkPassword = password_verify($password, $passwordHashed);
        /* $testhash = password_hash("Password1" , PASSWORD_BCRYPT);
         $verifytest = password_verify("Password1", "$testhash");
         if ($verifytest){
             echo "Test hat geklappt";
         } else{
             echo "Test hat fehlgeschlagen";
         } */

        // Falls das Passwort richtig ist, wird der Benutzer weitergeleitet
        if($checkPassword === true) {
            $user_id = $result['0']['user_id'];
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user_id;
            //header("Location:GUI.php");
            echo "Login erfolgreich";
        } else {
            echo "Login fehlgeschlagen2";
        }
    }
}



// Falls das Passwort falsch ist, speichere eine Fehlermeldung in einer Variablen
$error_message = "";
if (!$checkPassword) {
    $error_message = "Login fehlgeschlagen3";
}

$mysqli->close(); // Datenbankverbindung schließen
?>


<!-- Rest des HTML-Codes -->
<title>Login</title>
<h2 style="text-align: center;padding: 2%">Kennen wir uns?</h2>
<form style="text-align: center" method="POST" action="Login.php">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" name="username" style="width: 40%;margin-left: 30%" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" style="width: 40%;margin-left: 30%" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" name="submit" class="btn btn-dark" style="background-color: #032d57; margin-top: 1%">Login</button>
</form>
<div style="height: 36.5%;width: 100%"></div>

<?php include_once('footer.php'); ?>
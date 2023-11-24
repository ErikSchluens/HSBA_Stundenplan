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
<!--- divs to hold the results-->
<div class="body_box">

    <h2 style="margin: 0.5%" >Hallo <?php echo $username ?>, das sind deine Ergebnisse!</h2>

    <?php
    //define an indexed array, which holds all the possible excursions
    $excursions = array("_1"=>"Hamburg", "_2"=>"Lissabon", "_3" =>"Athen", "_4"=>"Bilbao" , "_5"=>"Bordeaux",
        "_6"=>"Limasol");

    //get the id number from the input table
    $stmt = $mysqli->prepare("SELECT * FROM Excursion_Input WHERE username = ?");
    $stmt ->bind_param("s", $username);
    $stmt ->execute();
    $result = $stmt ->get_result()->fetch_assoc();
    //save the user num to use it in later sql queries
    $user_num_excursion = $result["num"];
    // concat the user number to X_. we need that in the next sql query
    $variable_num_excursion = "X_".$user_num_excursion;

    //get only Data where the Variable name matches and the value is one meaning that this is the excoursion one will have
    $Valuestmt = $mysqli->prepare("SELECT * FROM `Excursion_Output` WHERE
                                     SUBSTRING_INDEX(variable, '_', 2)= ? AND wert = 1.0");
    $Valuestmt ->bind_param("s", $variable_num_excursion);
    $Valuestmt->execute();
    $excursions_result = $Valuestmt->get_result();

    // Define an array to store the values from the sql query
    $excursion_values = array();

    // Fetch each row and save the value of the "variable" column to the array and only take the substring
    // after the second underscore
    while ($row = $excursions_result->fetch_assoc()) {
        $excursion_values[] = strrchr($row['variable'], '_');
    }
    ?>

    <?php
    $courses = array("_1"=>"Spanisch", "_2"=>"Kommunikation", "_3" =>"Verhandlungsführung", "_4"=>"Selfempowerment" ,
        "_5"=>"Presentation_Skills",);

    $courses_stmt = $mysqli->prepare("SELECT * FROM WBÜ_Input WHERE username = ?");
    $courses_stmt ->bind_param("s", $username);
    $courses_stmt ->execute();
    $courses_result = $courses_stmt ->get_result()->fetch_assoc();
    //save the user num to use it in later sql queries
    $user_num_courses = $courses_result["num"];
    // concat the user number to X_. we need that in the next sql query
    $variable_num_courses = "X_".$user_num_courses;
    //get only Data where the Variable name matches and the value is one meaning that this is the course one will have
    $Valuestmt_courses = $mysqli->prepare("SELECT * FROM `WBÜ_Output` WHERE
                                     SUBSTRING_INDEX(variable, '_', 2)= ? AND wert = 1.0");
    $Valuestmt_courses ->bind_param("s", $variable_num_courses);
    $Valuestmt_courses->execute();
    $excursions_result = $Valuestmt_courses->get_result();
    // Define an array to store the values from the sql query
    $courses_values = array();

    // Fetch each row and save the value of the "variable" column to the array and only take the substring
    // after the second underscore
    while ($row = $excursions_result->fetch_assoc()) {
        $courses_values[] = strrchr($row['variable'], '_');
    }
    ?>

    <div class="homepage_optioncontainer">
        <div style="align-items: center; justify-content: center; text-align: center;">
            Du bist in der Exkursion nach <?=$excursions[$excursion_values[0]] ?>. <br>
            Deine Wahlpflichtkurse sind <?=$courses[$courses_values[0]] ?> und <?=$courses[$courses_values[1]]?>.
        </div>
    </div>

    <div class="homepage_optioncontainer">
        <!-- Dieser Footer wird als Platzhalter genutzt-->
    </div>
    <div class="homepage_optioncontainer">
        Falls du Fragen hast melde dich bite bei dem Administrationsteam!
    </div>
    <?php
    // Verbindung schließen
    $mysqli->close();
    ?>
    <?php include_once('footer.php') ?>

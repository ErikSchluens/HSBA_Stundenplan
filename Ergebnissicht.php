<?php
//This includes the header to the GUI (Home) page.
include_once ('header.php');
//if you´re not login you will be redirected to the Login page
if ($_SESSION['user_id'] == null) {
    header('Location:Login.php');
}
?>
<!--- divs to hold the results-->
<div class="body_box">
    <h2 style="margin: 0.5%" >Hallo <?php echo $username ?>, das sind deine Ergebnisse!</h2>

    <div class="homepage_optioncontainer">
        <div class="distribution_activator">
            <img src="WBÜ.png" alt="WBÜ-Icon" style="width:100px;height:100px; margin-bottom: 5%;">
            <div>
                <?php
                //from here the results for the WBÜs are retrieved the same way like the ones for the excursion
                //define an indexed array for the courses
                $courses = array("_1"=>"Spanisch", "_2"=>"Kommunikation", "_3" =>"Verhandlungsführung", "_4"=>"Selfempowerment" ,
                    "_5"=>"Presentation_Skills",);

                $courses_stmt = $mysqli->prepare("SELECT * FROM WBÜ_Input WHERE username = ?");
                $courses_stmt ->bind_param("s", $username);
                $courses_stmt ->execute();
                $courses_input_result = $courses_stmt ->get_result()->fetch_assoc();
                //save the user num to use it in later sql queries
                $user_num_courses = $courses_input_result["num"];
                // concat the user number to X_. we need that in the next sql query
                $variable_num_courses = "X_".$user_num_courses;
                //get only Data where the Variable name matches and the value is one meaning that this is the course one will have
                $Valuestmt_courses = $mysqli->prepare("SELECT * FROM `WBÜ_Output` WHERE
                                            SUBSTRING_INDEX(variable, '_', 2)= ? AND wert = 1.0");
                $Valuestmt_courses ->bind_param("s", $variable_num_courses);
                $Valuestmt_courses->execute();
                $courses_result = $Valuestmt_courses->get_result();
                if (mysqli_num_rows($courses_result) !=0){
                    // Define an array to store the values from the sql query
                    $courses_values = array();

                    // Fetch each row and save the value of the "variable" column to the array and only take the substring
                    // after the second underscore
                    while ($row = $courses_result->fetch_assoc()) {
                        $courses_values[] = strrchr($row['variable'], '_');
                    }

                    echo "Deine Wahlpflichtkurse sind " . $courses[$courses_values[0]] ." und " .  $courses[$courses_values[1]] . ".";

                } else {//dislay  message if there are no results yet
                    echo 'Die WBÜ-Kurse wurden noch nicht zugeteilt.';
                }
                ?>
            </div>
        </div>

        <div class="distribution_activator">
            <img src="Exkursion.png" alt="Exkursion-Icon" style="width:100px;height:100px; margin-bottom: 5%;">
            <div>
                <?php
                //define an indexed array, which holds all the possible excursions
                $excursions = array("_1"=>"Hamburg", "_2"=>"Lissabon", "_3" =>"Athen", "_4"=>"Bilbao" , "_5"=>"Bordeaux",
                    "_6"=>"Limasol");

                //get the id number from the input table
                $stmt = $mysqli->prepare("SELECT * FROM Excursion_Input WHERE username = ?");
                $stmt ->bind_param("s", $username);
                $stmt ->execute();
                $excursion_input_result = $stmt ->get_result()->fetch_assoc();
                //save the user num to use it in later sql queries
                $user_num_excursion = $excursion_input_result["num"];
                // concat the user number to X_. we need that in the next sql query
                $variable_num_excursion = "X_".$user_num_excursion;

                //get only Data where the Variable name matches and the value is one meaning that this is the excoursion one will have
                $Valuestmt = $mysqli->prepare("SELECT * FROM `Excursion_Output` WHERE
                                         SUBSTRING_INDEX(variable, '_', 2)= ? AND wert = 1.0");
                $Valuestmt ->bind_param("s", $variable_num_excursion);
                $Valuestmt->execute();
                $excursions_result = $Valuestmt->get_result();
                //only process data if there are results
                if (mysqli_num_rows($excursions_result) !=0){
                    // Define an array to store the values from the sql query
                    $excursion_values = array();

                    // Fetch each row and save the value of the "variable" column to the array and only take the substring
                    // after the second underscore
                    while ($row = $excursions_result->fetch_assoc()) {
                        $excursion_values[] = strrchr($row['variable'], '_');
                    }
                    echo "Du bist in der Exkursion nach " . $excursions[$excursion_values[0]]. ".";

                } else{ //dislay  message if there are no results yet
                    echo 'Die Exkursionen wurden noch nicht zugeteilt.';
                }
                ?>
            </div>
        </div>
    </div>
    <div style="text-align: center;">
        <h5> Falls du Fragen zu den Ergebnissen hast, melde dich bitte bei dem Administrationsteam der HSBA! </h5>
    </div>
</div>
<?php
include_once('footer.php')
?>

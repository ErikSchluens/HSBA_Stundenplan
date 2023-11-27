<?php
// This connects the application to the database
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'TimeTableKnowledge_v.0.2'; // If the name of your database in phpMyAdmin differs from this please adjust the name to access the database.
$db_port = 8889;

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_db, $db_port);

//If the connection to the database fails, there will be appear an error message for the user
if ($mysqli->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $mysqli->connect_error);
}
?>
<?php
// Session is started and the variables username and user_id are saved
session_start();
$username = (isset($_SESSION['username'])) ? $_SESSION['username'] : null;
$user_id = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : null;

?>

<html>
<head>
    <!-- Integration of the CSS, Framework and Javascript Scripts -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Connects the function to the 'change' Event of all select elements
            $('select').on('change', function() {
                var selectedValue = $(this).val(); // Retrieves the value from the selected option

                // Deactivates the selected option in all other Select-Elements
                $('select').not(this).find('option[value="' + selectedValue + '"]').prop('disabled', true);
            });
        });
    </script>
    <script> // Every Single dropdown is scripted, when to show and when to hide. Through the If-else function
        // the Dropdowns show and hide depending on the selection in the Dropdown before
        $(document).ready(function(){
            $('#dropdown2').hide();
            $('#dropdown3').hide();
            $('#dropdown4').hide();
            $('#dropdown5').hide();

            $('#dropdown1').change(function(){
                if($(this).val() !== ''){
                    $('#dropdown2').show();
                } else {
                    $('#dropdown2').hide();
                    $('#dropdown3').hide();
                    $('#dropdown4').hide();
                    $('#dropdown5').hide();
                }
            });

            $('#dropdown2').change(function(){
                if($(this).val() !== ''){
                    $('#dropdown3').show();
                } else {
                    $('#dropdown3').hide();
                    $('#dropdown4').hide();
                    $('#dropdown5').hide();
                }
            });

            $('#dropdown3').change(function(){
                if($(this).val() !== ''){
                    $('#dropdown4').show();
                } else {
                    $('#dropdown4').hide();
                    $('#dropdown5').hide();
                }
            });

            $('#dropdown4').change(function(){
                if($(this).val() !== ''){
                    $('#dropdown5').show();
                } else {
                    $('#dropdown5').hide();
                }
            });
        });
    </script>
    <link rel="stylesheet" href="GUI.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- In the following the navbar is created -->
<nav class="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" style="color: white; font-size: 30px;" href="GUI.php">HSBA</a>
        <button class="navbar-toggler" type="button" style="background-color: white" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-color: white"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php
                //Now I added a function that only a user who is logged in can see the Logout and Home button
                //otherwise there will be a Login
                if ($username) {
                    ?>
                    <a class="nav-link active" aria-current="page" style="color: white" href="GUI.php">Home</a>
                    <a class="nav-link" style="color: white" href="Logout.php">Logout</a>
                    <?php
                } else {
                    ?>
                    <a class="nav-link" style="color: white" href="#">Bitte logge dich ein, um auf alle Funktionen der Navbar zugreifen zu können.</a>
                    <a class="nav-link" style="color: white" href="Login.php">Login</a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</nav>

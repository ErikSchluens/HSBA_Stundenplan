<?php
// Session wird gestart und Username, sowie User_id werden in der Session gespeichert
session_start();
$username = (isset($_SESSION['username'])) ? $_SESSION['username'] : null;
$user_id = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : null;

?>

<html>
<head>
    <!-- Einbindung der Navbar, der CSS Datei und der Schriftarten -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Bindet die Funktion an das 'change'-Event aller Select-Elemente
            $('select').on('change', function() {
                var selectedValue = $(this).val(); // Holt den Wert des ausgewählten Options

                // Deaktiviert die ausgewählte Option in allen anderen Select-Elementen
                $('select').not(this).find('option[value="' + selectedValue + '"]').prop('disabled', true);
            });
        });
    </script>
    <script>
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
<nav class="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" style="color: white; font-size: 30px;" href="#">HSBA</a>
        <button class="navbar-toggler" type="button" style="background-color: white" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-color: white"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" style="color: white" href="GUI.php">Home</a>
                <a class="nav-link" style="color: white" href="Stundenplan.php">Stundenplan</a>

                <?php
                if ($username) {
                    ?>
                    <a class="nav-link" style="color: white" href="#">Profil</a>
                    <a class="nav-link" style="color: white" href="Logout.php">Logout</a>
                    <?php
                } else {
                    ?>
                    <a class="nav-link" style="color: white" href="Login.php">Login</a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</nav>

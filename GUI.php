<?php
//This includes the header to the GUI (Home) page.
include_once ('header.php');
// If you´re not logged in you will be redirected to the Login page
if ($_SESSION['user_id'] ==null ) {
    header('Location:Login.php');
}
?>
<!-- This is where the body of the page begins. -->
<div class="body_box">
    <!-- The user is welcomed on the Homepage. -->
    <div style="height: 5%">
        <div><img src='User.png' alt='Userimage' style='width:50px;height:50px; margin: 0.8%;'></div>
        <div style="margin-left: 6%; margin-top: -3.7%"><h2>Willkommen, <?php echo $username ?></h2></div>
    </div>
    <!-- The homepage will look different and contain different functions for every user group, depending on their user_id.  -->
    <?php
    if ($_SESSION['user_id'] >= 24) {
        // Display content for user group 24 and bigger (Students)
        echo '<div class="homepage_optioncontainer">
             <div style="justify-content: center; text-align: center;">
                <img src="WBÜ.png" alt="WBÜ-Icon" style="width:100px;height:100px; margin-bottom: 5%;"> 
                <div class="excursion_option" style="padding: 19%">
                    <a href="WBÜ.php" class="plus">+</a>
                 </div>
                 <p1> Klicke auf das Plus, um Deine WBÜs zu wählen. </p1>
            </div>
            <div style="justify-content: center; text-align: center;">
                <img src="Exkursion.png" alt="Exkursion-Icon" style="width:100px;height:100px; margin-bottom: 5%;"> 
                <div class="excursion_option" style="padding: 19%">
                    <a href="Excursion.php" class="plus">+</a>
                 </div>
                 <p1> Klicke auf das Plus, um Dein Exkursionsziel zu wählen. </p1>
            </div>
            <div style="justify-content: center; text-align: center;">
                <img src="Smiley.png" alt="Construction-Icon" style="width:100px;height:100px; margin-bottom: 5%;"> 
                <div class="excursion_option" style="padding: 19%">
                    <a href="Ergebnissicht.php" class="plus">+</a>
                 </div>
                 <p1> Klicke auf das Plus, um deine Wahlergebnisse zu sehen. </p1>
            </div>
          </div>';
    }
    if ($_SESSION['user_id'] == 22 || $_SESSION['user_id'] == 23) {
        // Display content for user group 22 and 23 (Administration)
        echo '<div class="homepage_optioncontainer">
             <div style="justify-content: center; text-align: center;">
                <img src="WBÜ.png" alt="WBÜ-Icon" style="width:100px;height:100px; margin-bottom: 5%;"> 
                <div class="excursion_option" style="padding: 19%">
                    <a href="WBÜ_Admin.php" class="plus">+</a>
                 </div>
                 <p1> Klicke auf das Plus, um die WBÜs zu verteilen. </p1>
            </div>
            <div style="justify-content: center; text-align: center;">
                <img src="Exkursion.png" alt="Exkursion-Icon" style="width:100px;height:100px; margin-bottom: 5%;"> 
                <div class="excursion_option" style="padding: 19%">
                    <a href="Exkursion_Admin.php" class="plus">+</a>
                 </div>
                 <p1>Klicke auf das Plus, um die Exkursionen zu verteilen. </p1>
            </div>
            <div style="justify-content: center; text-align: center;">
                <img src="Construction.png" alt="Construction-Icon" style="width:100px;height:100px; margin-bottom: 5%;"> 
                <div class="excursion_option" style="padding: 19%">
                    <a href="#" class="plus">+</a>
                 </div>
                 <p1> Hier wird noch an einem Stundenplan Generator gebaut. </p1>
            </div>
          </div>';
    }
    // Display content for user group 1 to 21 (Lecturers)
    $allowed_user_ids = range(1, 21);
    if (in_array($_SESSION['user_id'], $allowed_user_ids)) {
        // Display content for user group 1 to 21
        echo '<div class="homepage_optioncontainer">
            <div style="justify-content: center; text-align: center;">
                <img src="Construction.png" alt="Construction-Icon" style="width:100px;height:100px; margin-bottom: 5%;"> 
                <div class="excursion_option" style="padding: 19%">
                    <a href="#" class="plus">+</a>
                 </div>
                 <p> Hier wird noch an einer Kalenderdarstellung gebaut, um </p>
                  </n> 
                  <p> verfügbare Zeiten für den Stundenplan zu übermitteln. </p>
            </div>
          </div>';
    }
    ?>
</div>
<?php
//This includes the footer to the GUI (Home) page.
include_once('footer.php');
?>

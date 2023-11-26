<?php
//This includes the header to the Log-In page.
include_once('header.php');
?>

<?php
// definition of the username variable
$username = (isset($_REQUEST['username']) && !empty($_REQUEST['username'])) ? $_REQUEST['username'] : null;

// If query when the login button is pressed
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query of the user name from the database
    $stmt = $mysqli->prepare("SELECT * FROM LogIn WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    // If query whether the user exists in the database, if not, the login fails
    if (empty($result)) {
        echo "<p style='text-align: center; margin-top: 4%; font-weight: bolder'> Login Fehlgeschlagen.
                Bitte probiere es erneut </p>";
    } else {
        // Password verification
        $passwordHashed = password_hash($result["password"], PASSWORD_BCRYPT);

        $checkPassword = password_verify($password, $passwordHashed);

        // If the password is correct, the user will be redirected
        if($checkPassword === true) {
            $user_id = $result['user_id'];
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user_id;
            header("Location:GUI.php");
        } else {
            echo "<p style='text-align: center; margin-top: 4%; font-weight: bolder'> Login Fehlgeschlagen.
                    Bitte probiere es erneut </p>";
        }
    }
}
// If the password is incorrect, an error message is saved in a variable.
$error_message = "";
if (!$checkPassword) {
    $error_message = "Login fehlgeschlagen";
}
?>

<!-- HTML code of the Login-Page-->
<title>Login</title>
<div style="text-align: center"><img src='HSBA_Logo_Lang.jpg' alt='HSBA Logo' style='width: 750px; height:200px; margin-top: 2%; margin-bottom: 4%'></div>
<form style="text-align: center" method="POST" action="Login.php">
    <div>
        <label for="exampleInputEmail1">Username</label>
        <input type="text" name="username" style="width: 40%;margin-left: 30%" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
    </div>
    <div style="margin-top: 2%; margin-bottom: 2%">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" style="width: 40%;margin-left: 30%" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
    </div>
    <button type="submit" name="submit" class="btn btn-dark" style="background-color: #032d57; margin-top: 1%">Login</button>
</form>
<div style="height: 15%;width: 100%"></div>

<?php
//This includes the footer to the Log-In page.
include_once('footer.php');
?>

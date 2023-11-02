<!DOCTYPE html>

<?php include_once('header.php'); ?>

<body>

<?php
session_destroy();
header('Location:Log-Out.php');
?>

<main>
</main>

</body>

<?php include_once('footer.php'); ?>

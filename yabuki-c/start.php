<?php

session_start();

$_SESSION['friendid'] = $_POST['friendid'];
header('Location:dialog.php');
?>


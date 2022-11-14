<?php

ob_start();

session_start();


unset ($_SESSION['id'], $_SESSION['nome']);

$_SESSION['id'] = "0";
$_SESSION['nome'] = "";

header("Location: ../index.php");
die();


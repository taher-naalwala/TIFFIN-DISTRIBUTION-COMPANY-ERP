<?php 
session_start();
$_SESSION["access_qabrastan"] = "";
session_destroy();
header("Location: login.php");
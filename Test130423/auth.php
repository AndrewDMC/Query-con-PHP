<?php
session_start();
if(!isset($_SESSION["nickname"])){
header("Location: login.php");
exit(); }
?>
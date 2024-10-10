<?php
session_start();
require "Database.php";

$sql = "INSERT INTO `korzina`(`ID_User`, `Status`, `ID_Tovar`) VALUES (:user, :status, :tovar)";
$param = array(
    'tovar' => $_GET['id'],
    'user' => $_SESSION['id'],
    'status' => 'cart'
);
$database->get($sql, $param);
header('Location: cart.php');

?>
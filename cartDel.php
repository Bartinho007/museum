<?php
session_start();
require "Database.php";

$sql = "DELETE FROM `korzina` WHERE ID_Tovar = :id";
$param = array(
    'id' => $_GET['id']
);
$database->get($sql, $param);
header('Location: cart.php');

?>
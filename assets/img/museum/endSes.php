<?php
    session_start();

    require "Database.php";

    session_destroy();
    header("location: index.php");
?>
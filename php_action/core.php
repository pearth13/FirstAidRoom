<?php 

session_start();
require_once 'db_connect.php';
// echo $_SESSION['userId'];
 if($_SESSION['Ulevel'] == ''){
        header("location: ../../index.php");
    }
    if($_SESSION['Ulevel'] == '2'){
        header("location: ../../index.php");
    }
    if($_SESSION['Ulevel'] == '3'){
        header("location: ../../index.php");
    }


?>
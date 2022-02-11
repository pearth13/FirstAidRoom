<?php 

require_once 'db_connect.php';

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

header('location: ../login.php');

?>
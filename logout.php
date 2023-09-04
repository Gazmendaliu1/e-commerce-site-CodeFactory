<?php
session_start();

if (isset($_GET['logout'])) { // if a parameter logout is in the url (?logout)
   unset($_SESSION['user']); // removing the value from the session user
   unset($_SESSION['adm']); // removing the value from the session adm
   session_unset(); // removing the value from all sessions
   session_destroy(); 
   header("Location: index.php");
}
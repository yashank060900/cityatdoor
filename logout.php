<?php 
session_destroy();
unset($_SESSION['semail']);
unset($_SESSION['cemail']);
header("location: index.html");
?>
<?php 
session_start();
    session_unset();
    session_destroy();
header('Location: cart_list.php');
?>  



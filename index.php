<?php

session_start();
 

if(isset($_SESSION['user_id']) === true){
    header("Location: ./mistigriff.deck.class.php");
    exit();
}
?>
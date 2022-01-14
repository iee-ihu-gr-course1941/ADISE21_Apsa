<?php

session_start();
 

if(isset($_SESSION['user_id']) === true){
    header("Location: ./class Mistigriff.Card.php");
    exit();
}
?>
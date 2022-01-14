<?php

session_start();
 

if(isset($_SESSION['user_id']) === true){
    header("Location: ./cards.php");
    exit();
}
?>
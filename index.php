<?php

session_start();
 

if(isset($_SESSION['user_id']) === true){
    header("Location: ./mistigriff.class.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<link rel="icon" type ="text/css" href="./resources/pictures/cards.png" >
    <meta charset="utf-8">
    <title>Connect</title>
	<link href="../css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="../auth/login.php" method="post">
  
	<img class="mb-4" src="./resources/pictures/cards.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please enter your Credentials: </h1>
 
	<div class="form-floating">
	  <input type="text" name="username" id="floatingInput" placeholder="Username">
	</div>
    
	
	<div class="form-floating">
      <input type="password" name="password" id="floatingPassword" placeholder="Password">
    </div>

    <button type="submit">Connect</button>
	
    <p>Alexandros Psathas 175006</p>
  </form>
</main>


    
  </body>
</html>
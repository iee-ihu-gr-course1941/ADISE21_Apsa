<?php
include '../db/dbconnect.php';

session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    if (isset($_SESSION['game_status']) && $_SESSION['game_status'] == 'started') {
        header('Location: ./mistigriff.class.php');
        exit();
    }
?>


<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Board</title>
        <link rel="stylesheet" href="../css/maincss.css">
        
    </head>

    <body>
        <div class="top">
            <div class='current-user'>
                <h2 class="username">User: <?php echo $_SESSION['username']; ?></h2>
                <button onclick="location.href = '../auth/logout.php';" id="logout-button" class="logout-button">Αποσύνδεση</button>
            </div>
        </div>
        <h1 class="titlos">Good Luck !!</h1>
		<h1 class="kartes">Cards</h1>
        <div class="table">
            <table id="cards">
				<tr>
					<th>Symbol</th>
                    <th>Number</th>
				</tr>
            </table>
        </div>
		<p id='inform'>dokimi</p>
        <button id="take-card" onclick="startGame()" disabled> Take a Card </button>
		<p id='info'></p>
                  
    </body>
    <script src="../scripts/api.js"></script>

    </html>
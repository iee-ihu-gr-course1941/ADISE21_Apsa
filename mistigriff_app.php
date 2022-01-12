<?php

require_once('resources/php/mistigriff.class.php');
$action = isset($_GET['action']) ? $_GET['action'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$color = isset($_GET['color']) ? $_GET['color'] : null;

if($action == 'createGame'){
	Mistigriff::startGame();
}
else if($action == 'joinGame' && $id !== null){
	Mistigriff::joinGame($id);
}
else if($action == 'pullFromDeck'){
	Mistigriff::pullFromDeckToOwnDeck();
}
else if($action == 'pushToFront' && $id !== null){
	$error = Mistigriff::pushCardToFront($id,$color);
}
else if($action == 'debugGame'){
	if($id){
		$game = Mistigriff::getGameById($id);
	}
	else {
		$game = Mistigriff::getStartedGame();
	}
	Mistigriff::debugGame($game);
}
else if($action == 'debugSession'){
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
}
include('update.php');

?>

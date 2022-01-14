<?php

session_start();

include('../db/db_connect.php');
include('./mistigriff.deck.class.php');


$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);

if($input==null) {
    $input=[];
}
if(isset($_SERVER['HTTP_X_TOKEN'])) {
    $input['token']=$_SERVER['HTTP_X_TOKEN'];
} else {
    $input['token']='';
}


switch ($r = array_shift($request)) {
    case 'board':
		switch ($b = array_shift($request)) {
			case 'getGameCards':
					$currentHand = getGameCards();
					echo json_encode(array('status' => '200'));
                
                    //echo json_encode(array('status' => '404'));
                
                break;
			default:
                header("HTTP/1.1 404 Not Found");
                break;
        }
		break;
	default:
		header("HTTP/1.1 404 Not Found");
		break;
}


 

switch (array_shift($request)) {
    case 'board': 
        switch ($color=array_shift($request)) {
            case '':
            case null:
                handle_board($method, $input);
                break;
            case 'piece':
                handle_piece($method, $input);
                 break;
            default:
                header("HTTP/1.1 404 Not Found");
                break;
        }
        break;
    case 'status':
        if (sizeof($request)==0)
            handle_status($method);
        else
            header("HTTP/1.1 404 Not Found");
        break;
    case 'players':
        handle_player($method, $request, $input);
        break;
    case 'reset':
        handle_reset($method);
        break;
    default:
        header("HTTP/1.1 404 Not Found");
        exit;
}
?>

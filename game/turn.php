<?php
error_reporting(E_ALL ^ E_NOTICE);
include('../db.php');
include('function_turn.php'); // turn functions
// TODO: sanitize user input
session_start();
echo "<pre>";
	switch($_GET['action']) {
		case 'startGame':
			$return = startGame($_GET['name'], $_GET['champId'], $mysqli);
			var_dump($return);
//			echo json_encode($return); 
		break;
		case 'randomItem':
			$return = randomItem($_SESSION['gameId'], $mysqli);
			var_dump($return);
			//echo json_encode($return);
		break;
		case 'selectItem':
			$return = selectItem($_SESSION['gameId'], $_GET['itemNumber'], $mysqli);
			var_dump($return);
//			echo json_encode($return);
		break;
		case 'end':
			$return = endGame($_SESSION['gameId'], $mysqli);
			var_dump($return);
//			echo json_encod($return);
		break;
		case 'highscore':
			// top
			$return = highScore($mysqli, isset($_GET['top']) ? -1 : $_SESSION['lastGameId'], isset($_GET['page']) ? $_GET['page'] : 1);
			var_dump($return);
//			echo json_encode($return);
		break;
	}
echo "</pre>";

?>

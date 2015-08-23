<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include('../db.php');
include('function_turn.php'); // turn functions
// TODO: sanitize user input
	switch($_GET['action']) {
		case 'startGame':
			$return = startGame($_GET['name'], $_GET['champId'], $mysqli);
			echo json_encode($return);
		break;
		case 'randomItem':
			$return = randomItem($_SESSION['gameId'], $mysqli);
			echo json_encode($return);
		break;
		case 'selectItem':
			$return = selectItem($_SESSION['gameId'], $_GET['itemNumber'], $mysqli);
			echo json_encode($return);
		break;
		case 'endGame':
			$return = endGame($_SESSION['gameId'], $mysqli);
			echo json_encode($return);
		break;
		case 'highscore':
			// top
			$return = highScore($mysqli, isset($_GET['top']) ? -1 : $_SESSION['lastGameId'], isset($_GET['page']) ? $_GET['page'] : 1);
			echo json_encode($return);
		break;
		case 'abortGame': 
			$return = abortGame($_SESSION['gameId'], $mysqli);
			echo json_encode($return);
		break;
		case 'getStats':
			$return = getStats($_SESSION['gameId'], $mysqli);
			echo json_encode($return);
		break;
		case 'isGameActive':
			$return = isGameActive($_SESSION['gameId'], $mysqli);
			echo json_encode($return);
		break;
	}
?>

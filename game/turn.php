<?php
session_start();
// No notices  because champion sucks..
error_reporting(E_ALL ^ E_NOTICE);

include('../db.php');
include('Game.php');
include('GameFactory.php'); 
foreach($_GET as $key => $value) {
	$_GET[$key] = $mysqli->real_escape_string($value);
}
session_start(); // last session id!

// Step 1: Create game or get value if no game is needed
$creat = null;
switch($_GET['action']) {
		case 'startGame':
			$creat = GameFactory::createNewGame($_GET['name'], $_GET['champId'], $mysqli);
		break;
		case 'randomItem':
		case 'selectItem':
		case 'endGame':
		case 'abortGame': 
		case 'getStats':
			$creat = GameFactory::openGame($mysqli);
		break;
		case 'highscore':
			$creat['game'] = null;
			// top
			$creat['returnValue'] = Game::getHighScore($mysqli, isset($_GET['top']), isset($_GET['page']) ? $_GET['page'] : 1);
			$creat['returnValue']['session'] = $_SESSION['lastGameId'];
		break;
		case 'isGameActive':
			$creat['game'] = null;
			$creat['returnValue'] = Game::isGameActive($_SESSION['gameId'], $mysqli);
		break;
	}

// Step two: Either some error ocurred or we got the correct value. anyway set return
$return = null;
if ($creat['game'] == null) {
	$return = $creat['returnValue'];
} else {
	$game = $creat['game'];
	switch($_GET['action']) {
		case 'startGame':
		case 'getStats':
			$return = $game->getStats();
		break;
		case 'randomItem':
			$return = $game->getRandomItems();
		break;
		case 'selectItem':
			$return = $game->selectItem($_GET['itemNumber']);
		break;
		case 'endGame':
			$return = $game->endGame();
		break;
		case 'abortGame': 
			$return = $game->abortGame();
		break;
	}
}
echo json_encode($return);
?>

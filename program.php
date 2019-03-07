<?php
require_once("ConveysGame.php");

$newGame = new ConveysGame();
$newGame->readUserInput();
$newGame->start();



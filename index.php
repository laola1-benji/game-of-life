<?php
use Ralph\ConveysGame;
require 'vendor/autoload.php';

$newGame = new ConveysGame();
$newGame->readUserInput();
$newGame->start();
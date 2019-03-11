<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 08/03/2019
 * Time: 13:39
 */

require "vendor/autoload.php";
use GameOfLife\Board;
use GameOfLife\LifeForms\Toad;
use GameOfLife\LifeForms\Blinker;

$board = new Board();
$blinker = new Blinker(5, 6);
$toad = new Toad(1,1);

$board->addFormToBoard($blinker);
$board->addFormToBoard($toad);
$board->printBoard();
$board->runBoardXTimes(3);


<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 08/03/2019
 * Time: 13:39
 */

require "vendor/autoload.php";
use GameOfLife\Board;
use GameOfLife\LifeForms\Blinker;

$board = new Board();
$blinker = new Blinker(8, 6);
$blinker2 = new Blinker(2,3);

$board->addFormToBoard($blinker);
$board->addFormToBoard($blinker2);
$board->printBoard();
var_dump('---------------');
$board->runBoardOneTime();
var_dump('---------------');
$board->runBoardOneTime();
var_dump('---------------');
$board->runBoardOneTime();

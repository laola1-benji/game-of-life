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
$blinker = new Blinker(0, 1);
$board->addFormToBoard($blinker->area, $blinker->startingXPosition, $blinker->startingYPosition);
$board->printBoard($board->board);
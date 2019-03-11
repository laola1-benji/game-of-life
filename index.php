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
use GameOfLife\LifeForms\Glider;

$board = new Board();
$glider = new Glider(0, 0);

$board->addFormToBoard($glider);
$board->printBoard();
$board->runBoardXTimes(12);


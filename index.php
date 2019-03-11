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
use GameOfLife\Rules;

$board = new Board();
$blinker = new Blinker(9, 6);
$blinker2 = new Blinker(2,3);

$board->addFormToBoard($blinker);
$board->addFormToBoard($blinker2);
$board->printBoard();

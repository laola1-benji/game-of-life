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
$board->printBoard($board->board);

$blinker = new Blinker(1, 1);
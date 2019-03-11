<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 08.03.2019
 * Time: 13:04
 */

require ("vendor/autoload.php");
use GameOfLife\Board;

$board = new Board(9, 10);
$board->fillBoard("beacon", [4, 0]);
$board->fillBoard("beehive", [0, 6]);
$board->fillBoard("blinker", [7, 6]);

while(true){
    $board->oneLifeCycle();
    sleep(3);
}

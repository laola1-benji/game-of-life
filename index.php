<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 06.03.2019
 * Time: 13:35
 */

spl_autoload_register(function ($class_name) {
    include 'src/'.$class_name . '.php';
});

$blinker = new Blinker();
Play::checkLivingNeighbors($blinker->board);
Play::rules($blinker->board);
var_dump($blinker->board[1][0]->livingNeighbors." / ".$blinker->board[1][0]->newStatus);
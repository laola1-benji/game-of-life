<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 13:43
 */
    require("vendor/autoload.php");
    use GameOfLife\Board;


    $myBoard = new Board(9,9);
    $myBoard->fillBoard("beacon");
    while(true){
        $myBoard->transformBoard();
        sleep(3);
    }


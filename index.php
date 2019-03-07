<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 13:43
 */
    require("vendor/autoload.php");
    use Source\Board;

    //dead board
    $myBoard = new Board(9,9);
    //IT'S ALIVE!!!!
    $myBoard->fillBoard("beacon");
    //use algorithm on the board
    while(true){
        $myBoard->transformBoard();
        sleep(3);
    }


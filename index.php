<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 13:43
 */
    include_once("src/Board.php");
    include_once("src/LifeForm.php");

    //dead board
    $myBoard = new Board(9,9);
    //IT'S ALIVE!!!!
    $myBoard->fillBoard("beacon");
    $myBoard->displayBoard();
    //use algorithm on the board


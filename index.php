<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 06/03/2019
 * Time: 09:07
 */

$board = [];
$changingCell = [];
$x = 6;
$y = 6;

$board = makeBoard ($board, $x, $y);
$board = printBoard ($board, $x, $y);
$board = fillBoard ($board);
$board = printBoard ($board, $x, $y);
$board = changeboard ($board, $x, $y, $changingCell);
$board = printBoard ($board, $x, $y);

function makeBoard ($board, $x, $y) {
    for ($i = 1; $i <= $x; $i++) {
        for ($j = 1; $j <= $y; $j++){
            $board[$i][$j] = " 0 ";
        }
    }
    return $board;
}

function fillBoard ($board){
    //Beacon (period 2)
    /*
    $board[2][2] = " * ";
    $board[3][2] = " * ";
    $board[2][3] = " * ";
    $board[3][3] = " * ";
    $board[4][4] = " * ";
    $board[4][5] = " * ";
    $board[5][4] = " * ";
    $board[5][5] = " * ";
    */

    //Toad (period 2)
    $board[3][3] = " * ";
    $board[3][4] = " * ";
    $board[3][5] = " * ";
    $board[4][2] = " * ";
    $board[4][3] = " * ";
    $board[4][4] = " * ";

    return $board;
}

function printBoard ($board, $x, $y){
    for ($i = 1; $i <= $x; $i++) {
        for ($j = 1; $j <= $y; $j++) {
            echo $board[$i][$j];
        }
        echo "\n";
    }
    echo "\n";
    return $board;
}

function changeBoard ($board, $x, $y, $changingCell) {
    for ($i = 1; $i <= $x; $i++) {
        for ($j = 1; $j <= $y; $j++) {
            if ($board[$i][$j] == " * ") {
                if (checkBoard($board, $i, $j) < 2 ){
                    $changingCell[$i][$j] = " 0 ";
                }
                elseif (checkBoard($board, $i, $j) == 2 || checkBoard($board, $i, $j) == 3){

                }
                elseif (checkBoard($board, $i, $j) > 3){
                    $changingCell[$i][$j] = " 0 ";
                }
            }
            elseif ($board[$i][$j] == " 0 ") {
                if (checkBoard($board, $i, $j) == 3){
                    $changingCell[$i][$j] = " * ";
                }
            }
        }
    }
    for ($i = 1; $i <= $x; $i++) {
        for ($j = 1; $j <= $y; $j++) {
            if (isset($changingCell[$i][$j])){
                $board[$i][$j] = $changingCell[$i][$j];
            }
        }
    }
    return $board;
}

function checkBoard ($board, $xn, $yn) {
    $countCells = 0;
    //upper left cell
    if (isset($board[$xn-1][$yn-1])) {
        if ($board[$xn-1][$yn-1] == " * "){
            $countCells++;
        }
    }
    //upper cell
    if (isset($board[$xn][$yn-1])) {
        if ($board[$xn][$yn-1] == " * "){
            $countCells++;
        }
    }
    //bottom right cell
    if (isset($board[$xn+1][$yn-1])) {
        if ($board[$xn+1][$yn-1] == " * "){
            $countCells++;
        }
    }
    //left cell
    if (isset($board[$xn-1][$yn])) {
        if ($board[$xn-1][$yn] == " * "){
            $countCells++;
        }
    }
    //bottom cell
    if (isset($board[$xn+1][$yn])) {
        if ($board[$xn+1][$yn] == " * "){
            $countCells++;
        }
    }
    //upper right cell
    if (isset($board[$xn-1][$yn+1])) {
        if ($board[$xn-1][$yn+1] == " * "){
            $countCells++;
        }
    }

    if (isset($board[$xn][$yn+1])) {
        if ($board[$xn][$yn+1] == " * "){
            $countCells++;
        }
    }
    //bottom left cell
    if (isset($board[$xn+1][$yn+1])) {
        if ($board[$xn+1][$yn+1] == " * "){
            $countCells++;
        }
    }
    return $countCells;
}
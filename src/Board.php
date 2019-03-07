<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 06.03.2019
 * Time: 13:17
 */

class Board
{
    public $linesCount;
    public $colsCount;
    public $board;
    public $livingCells;

    public function initializeCells(){
        for($i = 0; $i < $this->linesCount; $i++){
            for($j = 0; $j < $this->colsCount; $j++){
                $this->board[$i][$j]=new Cell(false);
            }
        }
    }


}
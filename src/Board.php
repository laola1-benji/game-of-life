<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 06.03.2019
 * Time: 13:17
 */

namespace gameoflife;

class Board
{
    public $linesCount;
    public $colsCount;
    public $board;
    public $livingCells;

    public function initializeCells(){
        for($i = 0; $i < $this->linesCount; $i++){
            for($j = 0; $j < $this->colsCount; $j++){
                $this->board[$i][$j]=new Cell();
            }
        }
    }

    public function runBoardOneTime(){
        Play::checkLivingNeighbors($this->board);
        Play::rules($this->board);
        foreach($this->board as $lines){
            foreach($lines as $cell){
                $cell->setNewStatus();
                $cell->livingNeighbors = 0;
            }
        }
    }




}
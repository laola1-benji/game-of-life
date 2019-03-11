<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 08/03/2019
 * Time: 13:40
 */

namespace GameOfLife;

class Board
{
    public $board;

    public function __construct()
    {
        $this->buildBoard();

    }

    public function buildBoard(){
        for ($i=0; $i<10; $i++){
            for ($j=0; $j<10; $j++){
                $this->board[$i][$j] = new Cell();
            }
        }
    }

    public function printBoard()
    {
        foreach ($this->board as $line) {
            foreach ($line as $cell) {
                if ($cell->status == true) {
                    echo "O";
                } else {
                    echo ".";
                }
            }
            echo "\n";
        }
    }


    public function addFormToBoard($lifeForm){
        $formLine=0;
        for($i=$lifeForm->startingXPosition; $formLine<count($lifeForm->area); $i++) {
            $formCol=0;
            for($j=$lifeForm->startingYPosition; $formCol<count($lifeForm->area[$formLine]); $j++) {
                $this->board[$i][$j]=$lifeForm->area[$formLine][$formCol];
                $formCol++;
            }
            $formLine++;
        }
    }

    public function runBoardOneTime(){
        Rules::applyRules($this->board);
        $this->printBoard();
    }
}
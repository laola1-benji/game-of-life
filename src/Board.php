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
    public $field;

    public function __construct($lines, $cols){
        $this->linesCount = $lines;
        $this->colsCount = $cols;
        $this->initializeCells();
    }

    public function initializeCells(){
        for($i = 0; $i < $this->linesCount; $i++){
            for($j = 0; $j < $this->colsCount; $j++){
                $this->field[$i][$j]=new Cell(false);
            }
        }
    }


}
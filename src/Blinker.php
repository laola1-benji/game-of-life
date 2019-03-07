<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 06.03.2019
 * Time: 14:32
 */

class Blinker extends Board{

    public function __construct(){
        $this->linesCount = 3;
        $this->colsCount = 3;
        $this->initializeCells();
        $this->setLivingCells();
    }

    public function setLivingCells(){
        $this->livingCells=[
            [ 'xPos' => 1, 'yPos' => 0],
            [ 'xPos' => 1, 'yPos' => 1],
            [ 'xPos' => 1, 'yPos' => 2]
        ];

        foreach($this->livingCells as $cell){
            $this->board[$cell['xPos']][$cell['yPos']]->invertCell();
        }
    }
}
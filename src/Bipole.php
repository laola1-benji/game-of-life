<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 06.03.2019
 * Time: 15:14
 */

namespace gameoflife;

class Bipole extends Board{

    public function __construct($runCount){
        $this->linesCount = 4;
        $this->colsCount = 4;
        $this->initializeCells();
        $this->setLivingCells();
        for($i=0;$i<$runCount;$i++){
            $this->runBoardOneTime();
        }
    }

    private function setLivingCells(){
        $this->livingCells=[
            [ 'xPos' => 0, 'yPos' => 0],
            [ 'xPos' => 0, 'yPos' => 1],
            [ 'xPos' => 1, 'yPos' => 0],
            [ 'xPos' => 1, 'yPos' => 1],
            [ 'xPos' => 2, 'yPos' => 2],
            [ 'xPos' => 2, 'yPos' => 3],
            [ 'xPos' => 3, 'yPos' => 2],
            [ 'xPos' => 3, 'yPos' => 3]
        ];

        foreach($this->livingCells as $cell){
            $this->board[$cell['xPos']][$cell['yPos']]->isAlive = true;
        }
    }
}
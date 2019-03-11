<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 08/03/2019
 * Time: 13:40
 */

namespace GameOfLife;

class Cell
{
    public $status;
    public $livingNeighbors;
    public $newStatus;

    public function __construct()
    {
        $this->livingNeighbors=0;
        $this->status=false;
    }

    public function countLivingNeighbors($board, $xPosition, $yPosition){
        for($i=$xPosition-1;$i<=$xPosition+1; $i++){
            for($j=$yPosition-1;$j<=$yPosition+1; $j++){
                if($i!=$xPosition || $j!=$yPosition){
                    if(isset($board[$i][$j])&&$board[$i][$j]->status===true) {
                        $this->livingNeighbors++;
                    }
                }
            }
        }
    }

    public function setNewStatus(){
        $this->status=$this->newStatus;
        $this->livingNeighbors=0;
    }
}
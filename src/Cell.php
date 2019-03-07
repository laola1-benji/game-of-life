<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 06.03.2019
 * Time: 13:29
 */

class Cell{
    public $isAlive;
    public $livingNeighbors;
    public $newStatus;

    public function __construct($status){
        $this->isAlive = $status;
        $this->livingNeighbors=0;
    }

    public function invertCell(){
        if($this->isAlive === false){
            $this->isAlive = true;
        }else{
            $this->isAlive = false;
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 21:49
 */
require_once("AliveRule.php");
require_once("DeadRule.php");
require_once("ReviveRule.php");

class RuleFactory
{
    private $transformedBoard = [];
    private $height;
    private $boardOfNeighbours;
    function __construct($board, $height, $boardOfNeighbours)
    {
        $this->transformedBoard = $board;
        $this->height = $height;
        $this->boardOfNeighbours = $boardOfNeighbours;

    }

    public function loadRule($ruleName){
        if($ruleName == "kill"){
            $this->transformedBoard = new DeadRule($this->transformedBoard, $this->height, $this->boardOfNeighbours);
        }
        if($ruleName == "keep"){

        }
        if($ruleName == "revive"){
            $this->transformedBoard = new DeadRule($this->transformedBoard, $this->height, $this->boardOfNeighbours);
        }
    }
    public function getTransformedBoard(){
        return $this->transformedBoard;
    }

}
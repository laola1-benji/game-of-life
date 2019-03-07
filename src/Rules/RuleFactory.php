<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 21:49
 */
namespace GameOfLife\Rules;
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
            $kill = new DeadRule();
            $this->transformedBoard = $kill->applyRule($this->transformedBoard, $this->height, $this->boardOfNeighbours);
        }
        if($ruleName == "keep"){
            // board stays as it is.
        }
        if($ruleName == "revive"){
            $revive = new ReviveRule();
            $this->transformedBoard = $revive->applyRule($this->transformedBoard, $this->height, $this->boardOfNeighbours);
        }
    }

    public function getTransformedBoard(){
        return $this->transformedBoard;
    }

}
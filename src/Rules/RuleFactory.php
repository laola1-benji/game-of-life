<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 21:49
 */

class RuleFactory
{
    private $transformedBoard = [];
    public function loadRule($ruleName, $board, $height, $boardOfNeighbours){
        if($ruleName == "kill"){
            $transformedBoard = new DeadRule($board, $height, $boardOfNeighbours);
            return $transformedBoard;
        }
        if($ruleName == "keep"){
            return $board;
        }
        if($ruleName == "revive"){
            $transformedBoard = new DeadRule($board, $height, $boardOfNeighbours);
            return $transformedBoard;
        }


    }

}
<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 15:39
 */
require_once("RuleFactory.php");

class Referee
{
    private $boardOfNeighbours = [];
    public function applyRules($board,$height){
        for ($x = 0; $x <= sizeof($board); $x++) {
            for ($y = 0; $y <= $height; $y++) {
                $this->boardOfNeighbours[$x][$y] = $this->countNeighbours($board, $x, $y);
            }
        }
        $gameRules = new RuleFactory();
        $gameRules->loadRule("kill", $board, $height, $this->boardOfNeighbours);
        $gameRules->loadRule("revive", $board, $height, $this->boardOfNeighbours);
        $gameRules->loadRule("keep", $board, $height, $this->boardOfNeighbours);
    }

    private function countNeighbours($board, $cellX, $cellY){
        $neighbourCount = 0;
        for($x = -1; $x <= 1; $x++){
            for($y = -1; $y <= 1; $y++){
                if(isset($board[$x + $cellX][$y + $cellY]) && $board[$x + $cellX][$y + $cellY] == " X "){
                    $neighbourCount++;
                }
            }
        }
        return $neighbourCount;
    }

}
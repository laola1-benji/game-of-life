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
    private $board = [];
    private $height;

    public function __construct($board, $height)
    {
        $this->board = $board;
        $this->height = $height;
    }

    public function applyRules(){
        for ($x = 0; $x < sizeof($this->board); $x++) {
            for ($y = 0; $y <= $this->height; $y++) {
                $this->boardOfNeighbours[$x][$y] = $this->countNeighbours($this->board, $x, $y);
            }
        }
        $gameRules = new RuleFactory($this->board, $this->height, $this->boardOfNeighbours);
        $gameRules->loadRule("kill");
        $gameRules->loadRule("revive");
        $gameRules->loadRule("keep");
        $this->board = $gameRules->getTransformedBoard();
        return $this->board;
    }

    private function countNeighbours($board, $cellX, $cellY){
        $neighbourCount = 0;
        for($x = -1; $x <= 1; $x++){
            for($y = -1; $y <= 1; $y++){
                if(isset($board[$x + $cellX][$y + $cellY]) && $board[$x + $cellX][$y + $cellY] == " X "){
                    if(!($x == 0 && $y == 0) ){
                        $neighbourCount++;
                    }
                }
            }
        }
        return $neighbourCount;
    }

}
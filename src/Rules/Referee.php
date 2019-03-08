<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 15:39
 */
namespace GameOfLife\Rules;

class Referee
{
    private $boardOfNeighbours = [];
    private $board = [];
    private $height;

    /**
     * Referee constructor.
     * @param array $board
     * @param int $height
     */
    public function __construct($board, $height)
    {
        $this->board = $board;
        $this->height = $height;
    }

    /**
     * Load all the rules the referee deems necessary for this game
     * @return array
     */
    public function RuleLoader(){
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

    /**
     * Count the neighbours around a cell and return the number
     * @param array $board
     * @param int $cellX
     * @param int $cellY
     * @return int
     */
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
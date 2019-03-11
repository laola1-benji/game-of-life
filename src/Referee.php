<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 15:39
 */
namespace GameOfLife;
use GameOfLife\Rules\RuleFactory;
class Referee
{
    private $boardOfNeighbours = [];

    public function applyAllRules($board){
        for ($x = 0; $x < sizeof($board); $x++) {
            for ($y = 0; $y <= Board::getHeight(); $y++) {
                $this->boardOfNeighbours[$x][$y] = $this->countNeighbours($board, $x, $y);
            }
        }

        $gameRules = new RuleFactory($this->boardOfNeighbours);
        $gameRules->loadRule($board,"kill");
        $gameRules->loadRule($board,"revive");
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
                if(isset($board[$x + $cellX][$y + $cellY]) && ($board[$x + $cellX][$y + $cellY])->getStatus() == "X"){
                    if(!($x == 0 && $y == 0) ){
                        $neighbourCount++;
                    }
                }
            }
        }
        return $neighbourCount;
    }

}
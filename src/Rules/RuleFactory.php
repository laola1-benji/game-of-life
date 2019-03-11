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
    private $boardOfNeighbours;

    /**
     * RuleFactory constructor.
     * @param array $boardOfNeighbours
     */
    function __construct($boardOfNeighbours)
    {
        $this->boardOfNeighbours = $boardOfNeighbours;
    }

    public function loadRule($board, $ruleName){
        if($ruleName == "kill"){
            $kill = new DeadRule();
            $kill->applyRule($board, $this->boardOfNeighbours);
        }
        if($ruleName == "keep"){
            // board stays as it is.
        }
        if($ruleName == "revive"){
            $revive = new ReviveRule();
            $revive->applyRule($board, $this->boardOfNeighbours);
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 15:06
 */
namespace GameOfLife\Rules;
class AliveRule implements iRule
{
    /**
     * @param array $board
     * @param array $height
     * @param array $boardOfNeighbours
     * @return array|mixed
     */
    public function applyRule($board, $height, $boardOfNeighbours)
    {
        // TODO: Implement applyRule() method.
        return $board;
    }
}
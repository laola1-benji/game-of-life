<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 15:06
 */
namespace GameOfLife\Rules;
/**
 * Interface iRule, has to be implemented by each specific rule class
 * @package GameOfLife\Rules
 */
interface iRule
{
    /**
     * Applies a specific rule on the board board
     * @param array $board
     * @param int $height
     * @param array $boardOfNeighbours
     * @return array|mixed
     */
    public function applyRule($board, $height, $boardOfNeighbours);
}
<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 15:06
 */
namespace GameOfLife\Rules;
interface iRule
{
    public function applyRule($board, $height, $boardOfNeighbours);
}
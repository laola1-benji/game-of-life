<?php
/**
 * Created by PhpStorm.
 * User: michael.schwartz
 * Date: 08.03.2019
 * Time: 15:48
 */
namespace GameOfLife;

interface IBoard
{
    public function getRawFileFromCsv();
    public function displayGrid();
}
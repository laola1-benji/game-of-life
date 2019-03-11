<?php
/**
 * Created by PhpStorm.
 * User: michael.schwartz
 * Date: 08.03.2019
 * Time: 15:29
 */

require_once __DIR__ . '/vendor/autoload.php';
use GameOfLife\Board;

$test = new Board();
$test->getRawFileFromCsv();
$test->displayGrid();

<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 06.03.2019
 * Time: 13:35
 */

require "vendor/autoload.php";

use gameoflife\Blinker;
use gameoflife\Bipole;

$blinker = new Blinker(3);
$bipole = new Bipole(2);
var_dump($bipole->board);

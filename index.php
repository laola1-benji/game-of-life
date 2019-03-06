<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 06.03.2019
 * Time: 13:35
 */

spl_autoload_register(function ($class_name) {
    include 'src/'.$class_name . '.php';
});

$blinker = new Blinker();

var_dump($blinker->field);
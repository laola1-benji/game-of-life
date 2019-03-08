<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 08.03.2019
 * Time: 14:28
 */

namespace GameOfLife\Rules\Lifeforms;


class LifeFormFactory
{
    public function getForm($name)
    {
        switch ($name) {
            case "beehive" :
                return new Beehive();
                break;
            case "beacon" :
                return new Beacon();
                break;
            case "pulsar" :
                return new Pulsar();
                break;
            case "blinker" :
                return new Blinker();
                break;
        }
    }
}
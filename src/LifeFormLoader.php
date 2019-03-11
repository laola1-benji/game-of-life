<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 08.03.2019
 * Time: 14:28
 */

namespace GameOfLife;
use GameOfLife\Lifeforms\LifeFormCreator;

class LifeFormLoader
{
    private $lifeCoordinates = [];

    public function loadLife($lifeFormName,$startPoint, $board){
        $factory = new LifeFormCreator();
        $this->lifeCoordinates = $factory->getForm($lifeFormName, $startPoint);
        $this->transformBoard($board, $this->lifeCoordinates);
    }

    private function transformBoard($board, $lifeCoordinates){
        for($i = 0; $i<sizeof($lifeCoordinates); $i++) {
            ($board[$lifeCoordinates[$i][0]][$lifeCoordinates[$i][1]])->setStatus("X");
        }
    }
}
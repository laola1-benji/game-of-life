<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 06.03.2019
 * Time: 14:32
 */

class Blinker{
    public $field;
    public $livingCells;

    public function __construct(){
        $this->field = new Board(3, 3);
        $this->setLivingCells();
    }

    public function setLivingCells(){
        $this->livingCells=[
            [ 'xPos' => 1, 'yPos' => 0],
            [ 'xPos' => 1, 'yPos' => 1],
            [ 'xPos' => 1, 'yPos' => 2]
        ];

        foreach($this->livingCells as $cell){
            $this->field->field[$cell['xPos']][$cell['yPos']]->invertCell();
        }
    }
}
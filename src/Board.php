<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 08.03.2019
 * Time: 13:05
 */

namespace GameOfLife;


use GameOfLife\Referee;

class Board
{
    private $width;
    private $height;
    private static $bHeight;

    private $board = [];

    public function __construct($width, $height)
    {
        $this->height = $height;
        $this->width = $width;
        self::$bHeight = $height;
        $this->createBoard();
    }

    private function createBoard(){
        for($i = 0; $i<$this->width; $i++){
            for($j = 0; $j<$this->height; $j++){
                $this->board[$i][$j] = new Cell($i, $j, "O");
            }
        }
        $this->printBoard();
    }

    private function printBoard() {
        for($i = 0; $i<$this->width; $i++){
            for($j = 0; $j<$this->height; $j++){
                echo " " . ($this->board[$i][$j])->getStatus() . " ";
            }
            echo "\n";
        }
        echo "\n\n";
    }

    public function fillBoard($lifeFormName, $startPoint){
        $lifeforms = new LifeFormLoader();
        $lifeforms->loadLife($lifeFormName, $startPoint, $this->board);
        $this->printBoard();
    }

    public function oneLifeCycle(){
        $lifeCycle = new Referee();
        $lifeCycle->applyAllRules($this->board);
        $this->printBoard();
    }

    public static function getHeight(){
        return self::$bHeight;
    }
}
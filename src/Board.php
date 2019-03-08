<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 08.03.2019
 * Time: 13:05
 */

namespace GameOfLife;


class Board
{
    private $width;
    private $height;

    private $board = [];

    public function __construct($width, $height)
    {
        $this->height = $height;
        $this->width = $width;
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

    public function fillBoard(){
        $lifeforms = new Transformer($this->board);
        $this->board = $lifeforms->loadLife();
        $this->printBoard();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 15:02
 */

class Board
{
    private $board = [];
    private $height;
    private $width;
    function __construct($width, $height)
    {
        $this->height = $height;
        $this->width = $width;

        $this->createBoard($this->width, $this->height);
        $this->displayBoard();
    }

    private function createBoard($width, $height){
        for($x = 0; $x <= $width; $x++) {
            for($y = 0; $y <= $height; $y++) {
                $this->board[$x][$y] = " O ";
            }
        }
    }
    function displayBoard(){
        for($x = 0; $x <= $this->width; $x++) {
            for($y = 0; $y <= $this->height; $y++) {
                echo $this->board[$x][$y];
            }
            echo "\n";
        }
        echo "\n";echo "\n";
    }

    public function fillBoard($aliveCells){
        echo "Board populated with points: \n";
        for($i = 0; $i<sizeof($aliveCells); $i++){
            $this->board[$aliveCells[$i][0]][$aliveCells[$i][1]] = " X ";
            echo $aliveCells[$i][0] . " " . $aliveCells[$i][1] ." ".$this->board[$aliveCells[$i][0]][$aliveCells[$i][1]] . "\n";
        }

    }

}
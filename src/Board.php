<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 15:02
 */
include_once("LifeForm.php");
include_once("Rules/Referee.php");

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
    public function displayBoard(){
        for($x = 0; $x <= $this->width; $x++) {
            for($y = 0; $y <= $this->height; $y++) {
                echo $this->board[$x][$y];
            }
            echo "\n";
        }
        echo "\n\n";
    }

    public function fillBoard($formName){
        $myLifeForm = new LifeForm($formName);
        $aliveCells = $myLifeForm->getLifeForm();
        echo "Board populated with points: \n";
        for($i = 0; $i<sizeof($aliveCells); $i++) {
            $this->board[$aliveCells[$i][0]][$aliveCells[$i][1]] = " X ";
            echo $aliveCells[$i][0] . " " . $aliveCells[$i][1] . " " . $this->board[$aliveCells[$i][0]][$aliveCells[$i][1]] . "\n";
        }
    }

    public function transformBoard(){
        $rules = new Referee($this->board, $this->height);
        $this->board = $rules->applyRules();
    }

}
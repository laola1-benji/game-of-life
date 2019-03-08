<?php namespace src;
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 06.03.2019
 * Time: 15:02
 */
namespace GameOfLife;
use GameOfLife\Rules\Referee;
use GameOfLife\Lifeform\LifeForm;

class Board
{
    private $board = [];
    private $height;
    private $width;

    /**
     * Board constructor.
     * @param int $width
     * @param int $height
     */
    function __construct($width, $height)
    {
        $this->height = $height;
        $this->width = $width;
        $this->createBoard($this->width, $this->height);
        $this->displayBoard();
    }

    /**
     * Create empty board
     * @param int $width
     * @param int $height
     */
    private function createBoard($width, $height){
        for($x = 0; $x <= $width; $x++) {
            for($y = 0; $y <= $height; $y++) {
                $this->board[$x][$y] = " O ";
            }
        }
    }

    /**
     * Display the board with the cell status
     */
    private function displayBoard(){
        for($x = 0; $x <= $this->width; $x++) {
            for($y = 0; $y <= $this->height; $y++) {
                echo $this->board[$x][$y];
            }
            echo "\n";
        }
        echo "\n\n";
    }

    /**
     * Create new instance of Lifeform and save it's values inside the board
     * @param string $formName
     */
    public function fillBoard($formName){
        $myLifeForm = new LifeForm($formName);
        $aliveCells = $myLifeForm->getLifeForm();
        echo "Board populated with points: \n";
        for($i = 0; $i<sizeof($aliveCells); $i++) {
            $this->board[$aliveCells[$i][0]][$aliveCells[$i][1]] = " X ";
            echo $aliveCells[$i][0] . " " . $aliveCells[$i][1] . " " . $this->board[$aliveCells[$i][0]][$aliveCells[$i][1]] . "\n";
        }
        $this->displayBoard();
    }

    /**
     * Transform board using the game rules
     */
    public function transformBoard(){
        $myRules = new Referee($this->board, $this->height);
        $this->board = $myRules->RuleLoader();
        $this->displayBoard();
    }

}
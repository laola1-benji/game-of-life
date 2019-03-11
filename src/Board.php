<?php
/**
 * Created by PhpStorm.
 * User: michael.schwartz
 * Date: 08.03.2019
 * Time: 15:47
 */
namespace GameOfLife;

class Board implements IBoard{

    public $fileName;
    public $rawFile; // Bessere Idee?
    public $gridHeight;
    public $gridWidth;
    public $cells;

    public function __construct()
    {
        $this->cells = [];
    }

    public function initCells() {
        foreach ($this->cells as $cell){
            $cell = new Cell();
        }
    }

    public function getRawFileFromCsv() {
        $counter = 0;
        $openFile = fopen("src/Blinker.csv", "r");
        while (!feof($openFile)) {
            if ($counter === 0) {
                $this->fileName = fgets($openFile);
            } elseif ($counter === 1) {
                $line = fgets($openFile);
                $tmp = explode(",", $line);
                $this->gridWidth = $tmp[0];
                $this->gridHeight = $tmp[1];
            } else {

                // TODO:
                //$this->cells->isAlive = str_split(fgets($openFile));
            }
            $counter++;
        }
        fclose($openFile);
    }

    public function displayGrid() {
        echo "HALLOAHALALOADWLOWADLWALDOWAD";
//        foreach ($this->cells as $cell) {
//            echo $cell;
//            echo "<br>";
//        }
    }
}
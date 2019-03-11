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
    public $filePath;
    public $rawFile; // Bessere Idee?
    public $gridHeight;
    public $gridWidth;
    public $cells;

    public function __construct()
    {
        $this->cells = [];
        $this->image = [];
        //$this->filePath = __DIR__ . $filePath;
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
                $nextCharacter = fgetc($openFile);
                if ($nextCharacter === 'O')
                    $this->cells[] = new Cell(false);

                if ($nextCharacter === 'X') {
                    $this->cells[] = new Cell(true);
                }
                //$this->cells->isAlive = str_split(fgets($openFile));
            }
            $counter++;
        }
        fclose($openFile);
    }

    public function displayGrid() {
//        foreach($this->cells as $cell) {
//            if ($cell->isAlive === true) {
//                echo 'X';
//            }
//            else {
//                echo 'O';
//            }
//        }

        for ($i = 0; $i < sizeof($this->cells); $i++)  {
            if($i % $this->gridWidth == 0 && $i > 0) {
                echo "\n";
            }
            
            if ($this->cells[$i]->isAlive === true) {
                echo 'X';
            }

            if ($this->cells[$i]->isAlive === false) {
                echo 'O';
            }
        }
    }
}
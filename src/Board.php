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
    public $gridHeight;
    public $gridWidth;
    public $cells;

    public function __construct($file)
    {
        $this->cells = [];
        $this->filePath = $file;
        $this->getRawFileFromCsv();
    }

    public function getRawFileFromCsv() {
        $counter = 0;
        $openFile = fopen($this->filePath, "r");
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
            }
            $counter++;
        }
        fclose($openFile);
    }

    public function displayGrid() {
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
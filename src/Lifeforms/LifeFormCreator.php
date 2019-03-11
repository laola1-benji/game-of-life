<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 08.03.2019
 * Time: 14:28
 */

namespace GameOfLife\Lifeforms;

class LifeFormCreator
{
    private $lifeCoordinates = [];

    public function getForm($name, $startPoint)
    {
        switch ($name) {
            case "beehive" :
                $this->load($name, $startPoint);
                break;
            case "beacon" :
                $this->load($name, $startPoint);
                break;
            case "pulsar" :
                $this->load($name, $startPoint);
                break;
            case "blinker" :
                $this->load($name, $startPoint);
                break;
        }
        return $this->lifeCoordinates;
    }

    private function load($name, $startPoint){
        $filename = dirname(__DIR__) . '\resources\\' . $name . ".csv";
        echo "Loading file: " . $filename . "\n";
        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $columns = count($row);
                $xCoordinate = "";
                $yCoordinate = "";
                for ($c=0; $c < $columns; $c++) {
                    if($c == 0){
                        $xCoordinate = $startPoint[0] + $row[$c];
                    }
                    if ($c == 1){
                        $yCoordinate =$startPoint[1] + $row[$c];
                        array_push($this->lifeCoordinates, array($xCoordinate, $yCoordinate));
                    }
                }
            }
            fclose($handle);
        }
    }
}
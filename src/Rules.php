<?php

class Rules
{

    public function checkForRules($neighbors,$isAlive)
    {
         if($isAlive === false && $neighbors ===3) {
            return $isAlive = true;
         }elseif ($isAlive && ($neighbors < 2|| $neighbors > 3)){
            return $isAlive = false;
         }else {
            return $isAlive;
         }
    }
}
<?php

namespace Hackathon\LevelA;

class Redux
{
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    /**
     * Cette méthode ne prends rien en paramétre et retourne la reduction du nombre.
     *
     * @return string
     */
    public function getReductedNumber()
    {
        $result = $this->number;
        $res = PHP_INT_MAX;
        $strNum = (string) $result;

        while ($res > 9){
            $len = strlen($strNum);
            $res = 0;
            for ($i = 0; $i < $len; $i++){
                $res += $strNum[$i];

            }
        }
        var_dump($res);
die();
        return $res;
    }
};

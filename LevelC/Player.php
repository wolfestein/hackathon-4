<?php

namespace Hackathon\LevelC;

class Player
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSteps($partOfTheTrack, $context)
    {
        //var_dump($context);
        $instruction = "MMSMM";
        // @TODO
        return $instruction;
    }
};

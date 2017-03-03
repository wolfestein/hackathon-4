<?php
/**
 * DONT TOUCH
 */
namespace Hackathon\LevelC;

/**
 * Class Game
 * @package Hackathon\LevelC
 */
class Game
{
    private $track;
    private $players;
    private $lengthTrack;
    private $isFinish;

    /**
     * @param $length
     *
     * @desc The constructor needs the length of the Track that it will generate.
     * The constructor adds ten obstacles ('X') on the Track.
     */
    public function __construct($length)
    {
        $this->lengthTrack = $length;
        $this->track = array_fill(0, $length, '_');
        for ($i = 0; $i < 10; ++$i) {
            $pos = rand(0, $length - 2);
            $this->track[$pos] = 'X';
        }
        $this->isFinish = false;
    }

    /**
     * @param $id           // Identifier of the Player
     * @param $instructions // The step sequence that the Game engine will process
     *
     * @return string       // The remaining Track that the Player asks to see
     *
     * @desc This function processes the instructions of the current Player and moves him on the Track
     */
    public function playerSteps($id, $instructions)
    {
        // Count the number of 'M' in the instruction
        $moveSteps = mb_substr_count($instructions, 'M');
        $seeSteps = mb_substr_count($instructions, 'S');

        // Getting the current number of instructions given to the Game
        $nbInstruction = $this->getPlayerContext($id, 'nb_instruction');

        // Update the value to the new new of the instructions given to the Game
        $this->setPlayerContext($id, 'nb_instruction', ++$nbInstruction);

        // Move the player with a padding of "$moveSteps"
        $this->movePlayer($id, $moveSteps);

        // Return the requested part of the Track with a length of "$seeSteps"
        return $this->getPartOfTrack($id, $seeSteps);
    }


    /**
     * @param $id           // Identifier of the Player
     * @param $length       // The requested length of the Track
     * @throws \Exception   // The exceptions are thrown by fuelChecksAndUpdate() and getPlayerContext()
     *
     * @return string       // The string corresponding to the requested part
     *
     * @desc This function gives the corresponding string to the requested section relative to the position of the player
     */
    public function getPartOfTrack($id, $length)
    {
        $position = $this->getPlayerContext($id, 'position');
        $this->fuelChecksAndUpdate($id, $length);

        return substr($this->getDisplayableTrack(), $position, $length);
    }

    /** Cette fonction permet l'ajout d'un nouveau joueur sur le circuit */
    public function getNewPlayer($name)
    {
        $id = count($this->players);
        $player = new Player($id, $name);

        $this->players[$id] = array('fuel' => $this->lengthTrack * 3,
            'position' => 0,
            'nb_instruction' => 0);

        return $player;
    }

    public function isFinish(){
        return $this->isFinish;
    }

    /** Cette fonction permet de déplacer un joueur */
    private function movePlayer($id, $moveSteps)
    {
        $this->fuelChecksAndUpdate($id, $moveSteps);
        $newPosition = $this->getPlayerContext($id, 'position') + $moveSteps;

        $this->newPositionChecks($newPosition);
        $this->setPlayerContext($id, 'position', $newPosition);
    }

    /**
     * Cette fonction vérifier si le joueur peut se déplacer ==> et le déplace.
     */
    private function newPositionChecks($newPosition)
    {
        if ($newPosition > $this->lengthTrack) {
            throw new \Exception("Le joueur est aller plus loin que la piste : $newPosition", 1);
        }

        if ($newPosition === $this->lengthTrack) {
            $this->isFinish = true;
        } elseif ('X' === $this->track[$newPosition]) {
            throw new \Exception("Le joueur s'est arrêté sur un obstacle : $newPosition", 1);
        }
    }

    /**
     * Cette fonction permet de vérifier si le joueur peut avancer en fonction de sa capacité en fuel.
     */
    private function fuelChecksAndUpdate($id, $fuelConsumption)
    {
        $actualFuel = $this->players[$id]['fuel'];

        if ($fuelConsumption > 6) {
            throw new \Exception("Le joueur a dépassé la limite d'ordre 'M' ou 'S' (fixé à 5)", 1);
        }

        if ($actualFuel < $fuelConsumption) {
            throw new \Exception("Tu n'as pas assez de fuel pour continuer", 1);
        }

        $remainingFuel = $actualFuel - $fuelConsumption;
        $this->setPlayerContext($id, 'fuel', $remainingFuel);
    }

    /**
     * Cette fonction permet de récupérer le contexte lié à un joueur.
     */
    public function getPlayerContext($id, $context)
    {
        if (!isset($this->players[$id])) {
            throw new \Exception("Le joueur n'existe pas", 1);
        }

        if ('full' === $context) {
            return $this->players[$id];
        }

        if (!isset($this->players[$id][$context])) {
            throw new \Exception("Le contexte n'existe pas", 1);
        }

        return $this->players[$id][$context];
    }

    /**
     * Cette fonction permet de récupérer le contexte lié à un joueur.
     */
    private function setPlayerContext($id, $context, $value)
    {

        if (!isset($this->players[$id])) {
            throw new \Exception("Le joueur n'existe pas", 1);
        }

        if (!isset($this->players[$id][$context])) {
            throw new \Exception("Le contexte n'existe pas", 1);
        }

        $this->players[$id][$context] = $value;
    }

    /**
     * Cette fonction retourne une chaine de caractères qui affiche la piste
     ** Un underscore "_" représente la piste quand tout va bien
     ** Un X              représente un obstacle.
     */
    private function getDisplayableTrack()
    {
        return implode('', $this->track);
    }

};

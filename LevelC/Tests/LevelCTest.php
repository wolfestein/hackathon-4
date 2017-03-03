<?php

namespace Hackathon\LevelC\Tests;

use Hackathon\LevelC\Game;

class LevelCTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider bourrinProvider
     */
    public function testPlop($value, $expected)
    {
        $this->checkFiles();
        $game = new Game($value);
        $bobby = $game->getNewPlayer('Bobby');
        $bobbyId = $bobby->getId();

        // Au démarrage, on donne les 5 premières cases (caractères) du circuit (track)
        $partOfTheTrack = $game->getPartOfTrack($bobbyId, 5);
        while (!$game->isFinish()) {
            $context = $game->getPlayerContext($bobbyId, 'full');
            $steps = $bobby->getSteps($partOfTheTrack, $context);
            $partOfTheTrack = $game->playerSteps($bobbyId, $steps);
        }

        // Il faut que le nombre d'instruction ne soit pas énorme.
        $this->assertGreaterThan($game->getPlayerContext($bobbyId, 'nb_instruction'), $value + 2);
    }

    public function bourrinProvider()
    {
        $tests =
            array(
                array(100, 'pouet'),
                array(rand(100, 200), 'pouet'),
                array(rand(100, 200), 'pouet'),
                array(rand(100, 200), 'pouet'),
                array(rand(100, 200), 'pouet'),
                array(rand(100, 200), 'pouet'),
                array(rand(100, 200), 'pouet'),
                array(rand(100, 200), 'pouet'),
                array(date('s') * 4, 'pouet'),
            );

        return $tests;
    }

    /** Je vérifie que vous ne modifiez pas les fichiers BANDE de COQUINOUX */
    private function checkFiles()
    {
        $gameFileName = __DIR__.'/../Game.php';
        $this->assertEquals(md5_file($gameFileName), '8fc79c64a69699c120997c15f8b8984e');
    }
}

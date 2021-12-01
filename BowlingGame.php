<?php

require('Player.php');
require('ScoreBoard.php');

class BowlingGame
{   
    private $scoreBoard;
    private $players = [];
    private $round;

    public function __construct()
    {
        return $this;
    }

    private function addPlayer($name)
    {
        array_push($this->players, new Player($name));
    }

    private function playRound()
    {
        for ($i = 0; $i < sizeof($this->players); $i++) {
            $player = $this->players[$i];
            $punteneerstegooi = readline($player->getName() . ": Hoeveel heb je gegooid? ");
            $punteneerstegooi2 = readline($player->getName() . ": Hoeveel heb je gegooid in tweede worp? ");
            $player->throwPins($punteneerstegooi, $punteneerstegooi2);
        }
        
        $this->scoreboard->displayScores();
    }

    private function playLastRound()
    {
        for ($i = 0; $i < sizeof($this->players); $i++) {
            $player = $this->players[$i];
            echo "Laaste worp" . PHP_EOL . PHP_EOL;
            $punteneerstegooi = readline($player->getName() . ": Hoeveel heb je gegooid? ");
            $punteneerstegooi2 = 0;
            $player->throwPins($punteneerstegooi, $punteneerstegooi2);
        }
    }

    public function play()
    {
        echo "Hoeveel spelers doen er mee?"; 
        $getalspelers = readline(": ");
        for ($i = 0; $i < $getalspelers; $i++) {
        echo "Naam van de speler?";
           $this->addPlayer(readline(": "));
        }
        $this->scoreboard = new Scoreboard($this->players);
        for ($i = 0; $i < 10; $i++) {
            $this->playRound();
        }
        $this->playLastRound();
        echo "Einde: " . PHP_EOL;
        return $this->scoreboard->displayScores();
    }
}

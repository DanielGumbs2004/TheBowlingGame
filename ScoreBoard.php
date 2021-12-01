<?php

class Scoreboard
{
    private $scores;
    private $players = [];

    public function __construct($players)
    {
        $this->players = $players;
    }

    private function calculatePlayerscore($player)
    {
        $pins = $player->getPinsThrown();
        $total = 0;
        for ($i = 0; $i < sizeof($pins); $i++) {
            $total = $total + $pins[$i][0] + $pins[$i][1];
        }
        return $total;
    }

    private function calculateAllscores()
    {
        for ($i = 0; $i < sizeof($this->players); $i++) {
            $this->scores[$i] = $this->calculatePlayerscore($this->players[$i]);
        }
    }

    public function displayScores()
    {
        $this->calculateAllscores();

        foreach ($this->scores as $key => $value) {
            $player = $this->players[$key];
            $name = $player->getName();
            echo "Speler $name heeft $value punten" . PHP_EOL;
        }
    }

    public function displayWinner()
    {   $scores = max($this->scores);
        foreach ($scores as $key => $value) {
            $player = $this->players[$key];
            $name = $player->getName();
            echo "Gefelicteerd speler $name je hebt gewonnen" . PHP_EOL;
        }
    }
}
?>

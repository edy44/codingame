<?php

namespace CodinGame\Medium\War;

use JetBrains\PhpStorm\Pure;

/**
 * Class Snap
 * @package CodinGame\Medium\War
 */
class War
{
    /**
     * @var array
     */
    public const CARDS_VALUES = ["2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A"];
    /**
     * @var array
     */
    public const CARDS_TYPE = ["S", "D", "C", "H"];
    /**
     * @var int
     */
    private int $turns;
    /**
     * @var Player[]
     */
    private array $players;
    /**
     * @var Player|null
     */
    private ?Player $winner;
    /**
     * @var bool
     */
    private bool $pat;

    /**
     * War constructor.
     * @param array $cardsPlayers
     */
    public function __construct(array $cardsPlayers)
    {
        $this->turns = 0;
        $this->players = [];
        foreach ($cardsPlayers as $cardsPlayer) {
            array_push($this->players, new Player($cardsPlayer));
        }
        $this->winner = null;
        $this->pat = false;
    }

    /**
     * @return int
     */
    public function getTurns(): int
    {
        return $this->turns;
    }

    /**
     * @return string
     */
    #[Pure] public function getWinner(): string
    {
        if ($this->pat) {
            return 'PAT';
        }

        $key = array_search($this->winner, $this->players);
        return strval($key + 1);
    }

    public function playGame(): void
    {
        while (!$this->gameOver() && !$this->pat) {
            $this->initTurn();
            $this->turns++;
            $this->playTurn();
            if (!$this->pat) {
                $this->winner->addDiscards($this->players);
            }
        }

        $this->searchGameWinner();
    }

    /**
     * @return bool
     */
    #[Pure] private function gameOver(): bool
    {
        $playersStillInGame = 0;

        foreach ($this->players as $player) {
            if ($player->stillInGame()) {
                $playersStillInGame++;
            }
        }

        return $playersStillInGame === 1;
    }

    private function initTurn(): void
    {
        foreach ($this->players as $key => $player) {
            $player->initTurn();
            $this->players[$key] = $player;
        }
        $this->winner = null;
    }

    private function playTurn(): void
    {
        while (is_null($this->winner) && !$this->gameOver() && !$this->pat) {
            foreach ($this->players as $key => $player) {
                $player->playCard();
                $this->players[$key] = $player;
            }

            $this->searchTurnWinner();

            if (is_null($this->winner)) {
                $this->snap();
            }
        }
    }

    private function searchTurnWinner(): void
    {
        $maxValue = -1;

        foreach ($this->players as $player) {
            if ($player->getCardPlayed() === $maxValue) {
                $this->winner = null;
            }
            if ($player->getCardPlayed() > $maxValue) {
                $maxValue = $player->getCardPlayed();
                $this->winner = $player;
            }
        }
    }

    private function snap(): void
    {
        foreach ($this->players as $key => $player) {
            $player->snap();
            $this->players[$key] = $player;
            if (!$player->stillInGame()) {
                $this->pat = true;
            }
        }
    }

    private function searchGameWinner(): void
    {
        foreach ($this->players as $player) {
            if ($player->stillInGame()) {
                $this->winner = $player;
            }
        }
    }
}

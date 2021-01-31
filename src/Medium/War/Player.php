<?php

namespace CodinGame\Medium\War;

/**
 * Class Player
 * @package CodinGame\Medium\War
 */
class Player
{
    /**
     * @var int
     */
    private const SNAP_CARDS = 3;
    /**
     * @var array
     */
    public array $cards;
    /**
     * @var array
     */
    private array $discards;
    /**
     * @var int|null
     */
    private ?int $cardPlayed;

    /**
     * Player constructor.
     * @param array $cards
     */
    public function __construct(array $cards)
    {
        $this->cards = $cards;
        $this->cardPlayed = null;
        $this->discards = [];
    }

    /**
     * @return array
     */
    public function getDiscards(): array
    {
        return $this->discards;
    }

    /**
     * @param string $card
     */
    public function setCardPlayed(string $card): void
    {
        $types = implode('|', War::CARDS_TYPE);
        $value = preg_replace('/^(.*)(' . $types . ')$/', '$1', $card);
        $this->cardPlayed = intval(array_search($value, War::CARDS_VALUES));
    }

    /**
     * @return int
     */
    public function getCardPlayed(): int
    {
        return $this->cardPlayed;
    }

    public function initTurn(): void
    {
        $this->cardPlayed = null;
        $this->discards = [];
    }

    public function playCard(): void
    {
        $key = array_key_first($this->cards);
        $this->setCardPlayed($this->cards[$key]);
        array_push($this->discards, $this->cards[$key]);
        unset($this->cards[$key]);
    }

    /**
     * @param Player[] $players
     */
    public function addDiscards(array $players): void
    {
        foreach ($players as $player) {
            foreach ($player->getDiscards() as $card) {
                array_push($this->cards, $card);
            }
        }
    }

    public function snap(): void
    {
        $number = self::SNAP_CARDS;
        while ($number > 0 && $this->stillInGame()) {
            $this->playCard();
            $number--;
        }
    }

    /**
     * @return bool
     */
    public function stillInGame(): bool
    {
        return !empty($this->cards);
    }
}

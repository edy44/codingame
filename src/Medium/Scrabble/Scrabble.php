<?php

namespace CodinGame\Medium\Scrabble;

use JetBrains\PhpStorm\Pure;

/**
 * Class Scrabble
 * @package CodinGame\Medium\Scrabble
 */
class Scrabble
{
    /**
     * @var int[]
     */
    private const POINTS = [
        "a" => 1, "b" => 3, "c" => 3, "d" => 2, "e" => 1, "f" => 4, "g" => 2, "h" => 4, "i" => 1, "j" => 8, "k" => 5,
        "l" => 1, "m" => 3, "n" => 1, "o" => 1, "p" => 3, "q" => 10, "r" => 1, "s" => 1, "t" => 1, "u" => 1, "v" => 4,
        "w" => 4, "x" => 8, "y" => 4, "z" => 10
    ];
    /**
     * @var int[]
     */
    private array $results;
    /**
     * @var string[]
     */
    private array $dictionary;

    /**
     * ScrabbleContext constructor.
     * @param string[] $dictionary
     */
    #[Pure] public function __construct(array $dictionary)
    {
        $this->results = [];
        $this->dictionary = $dictionary;
    }

    /**
     * @param string $letters
     */
    public function findCombinations(string $letters): void
    {
        $letters = str_split($letters);

        foreach ($this->dictionary as $word) {
            $word = str_split($word);
            if ($this->hasMatched($letters, $word)) {
                $score = $this->findWordScore($word);
                $this->addToResults($word, $score);
            }
        }
    }

    /**
     * @return string
     */
    #[Pure] public function getBestWord(): string
    {
        return (!empty($this->results)) ? array_search(max($this->results), $this->results) : '';
    }

    /**
     * @param string[] $letters
     * @param string[] $word
     * @return bool
     */
    private function hasMatched(array $letters, array $word): bool
    {
        $matches = array_map(function ($character) use (&$letters) {
            $index = array_search($character, $letters);
            if (is_int($index)) {
                unset($letters[$index]);
                return $character;
            }
            return null;
        }, $word);
        return $matches === $word;
    }

    /**
     * @param string[] $word
     * @return int
     */
    private function findWordScore(array $word): int
    {
        $scores = array_map(function ($character) {
            return self::POINTS[$character];
        }, $word);
        return array_sum($scores);
    }

    /**
     * @param array $word
     * @param $score
     */
    private function addToResults(array $word, $score): void
    {
        $word = implode('', $word);
        $this->results[$word] = $score;
    }
}

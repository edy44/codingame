<?php

namespace CodinGame\Easy\ArtASCII;

/**
 * Class ArtASCII
 * @package CodinGame\ArtASCII
 */
class ArtASCII
{
    /**
     * @var string
     */
    private const ALPHABET = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ?';
    /**
     * @var int
     */
    private int $height;
    /**
     * @var int
     */
    private int $width;
    /**
     * @var array
     */
    private array $ascii;
    /**
     * @var array
     */
    private array $results;

    /**
     * ArtASCII constructor.
     * @param int $height
     * @param int $width
     * @param array $ascii
     */
    public function __construct(int $height, int $width, array $ascii)
    {
        $this->height = $height;
        $this->width = $width;
        $this->ascii = $ascii;
        $this->results = $this->initResults();
    }

    /**
     * @param string $text
     * @return array
     */
    public function transform(string $text): array
    {
        for ($i = 0; $i < strlen($text); $i++) {
            $position = $this->findPositionInAlphabet($text[$i]);
            $this->addCharacterInASCIIArt($position);
        }

        return $this->results;
    }

    /**
     * @param string $character
     * @return int
     */
    private function findPositionInAlphabet(string $character): int
    {
        $position = strlen(self::ALPHABET) - 1;

        for ($i = 0; $i < strlen(self::ALPHABET); $i++) {
            if (self::ALPHABET[$i] === ucfirst($character)) {
                $position = $i;
                break;
            }
        }

        return $position;
    }

    /**
     * @param int $position
     */
    private function addCharacterInASCIIArt(int $position): void
    {
        for ($i = 0; $i < $this->height; $i++) {
            $this->results[$i] .= $this->findRightString($position, $i);
        }
    }

    /**
     * @return array
     */
    private function initResults(): array
    {
        $results = [];
        $lines = 0;

        while ($lines < $this->height) {
            $results[$lines] = '';
            $lines++;
        }

        return $results;
    }

    /**
     * @param int $position
     * @param int $line
     * @return string
     */
    private function findRightString(int $position, int $line): string
    {
        return substr($this->ascii[$line], $position * $this->width, $this->width);
    }
}

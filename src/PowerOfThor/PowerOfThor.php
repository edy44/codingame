<?php

namespace CodinGame\PowerOfThor;

/**
 * Class PowerOfThor
 * @package CodinGame\PowerOfThor
 */
class PowerOfThor
{
    /**
     * @var int
     */
    private int $initialX;
    /**
     * @var int
     */
    private int $initialY;
    /**
     * @var int
     */
    private int $lightX;
    /**
     * @var int
     */
    private int $lightY;

    /**
     * PowerOfThor constructor.
     * @param int $initialX
     * @param int $initialY
     * @param int $lightX
     * @param int $lightY
     */
    public function __construct(
        int $initialX,
        int $initialY,
        int $lightX,
        int $lightY
    ) {
        $this->initialX = $initialX;
        $this->initialY = $initialY;
        $this->lightX = $lightX;
        $this->lightY = $lightY;
    }

    /**
     * @param int $remainingTurns
     * @return string
     */
    public function findDirection(int $remainingTurns): string
    {
        return ($remainingTurns > 0) ? $this->northOrSouth() . $this->westOrEst() : '';
    }

    /**
     * @return string
     */
    private function westOrEst(): string
    {
        if ($this->lightX > $this->initialX) {
            $this->initialX++;
            return 'E';
        }

        if ($this->lightX < $this->initialX) {
            $this->initialX--;
            return 'W';
        }

        return '';
    }

    /**
     * @return string
     */
    private function northOrSouth(): string
    {
        if ($this->lightY > $this->initialY) {
            $this->initialY++;
            return 'S';
        }

        if ($this->lightY < $this->initialY) {
            $this->initialY--;
            return 'N';
        }

        return '';
    }
}

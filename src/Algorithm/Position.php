<?php

declare(strict_types=1);

namespace CodinGame\Algorithm;

final class Position
{
    private const COEFFICIENT = 10;

    private function __construct(private readonly int $x, private readonly int $y)
    {
    }

    public static function init(int $x, int $y): self
    {
        return new self(x: $x, y: $y);
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public static function getNewPositionWithMove(Position $currentPosition, Position $move): self
    {
        $x = $currentPosition->getX() + $move->getX();
        $y = $currentPosition->getY() + $move->getY();

        return new self(x: $x, y: $y);
    }

    public static function arePositionsEquals(Position $position1, Position $position2): bool
    {
        return $position1->getX() === $position2->getX() && $position1->getY() === $position2->getY();
    }

    public static function calculateDistance(Position $from, Position $to): int
    {
        $x = $from->getX() - $to->getX();
        $y = $from->getY() - $to->getY();

        return intval(sqrt(pow($x, 2) + pow($y, 2)) * self::COEFFICIENT);
    }
}

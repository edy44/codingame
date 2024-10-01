<?php

declare(strict_types=1);

namespace CodinGame\Algorithm;

use Exception;

abstract class Map
{
    /**
     * @param array<array-key,Node> $grid
     */
    protected function __construct(
        private readonly int      $height,
        private readonly int      $width,
        private readonly array    $grid,
        private readonly Position $startPosition,
        private readonly Position $endPosition,
    ) {
    }

    final public function getHeight(): int
    {
        return $this->height;
    }

    final public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return array<array-key,Node>
     */
    final public function getGrid(): array
    {
        return $this->grid;
    }

    final public function getStartPosition(): Position
    {
        return $this->startPosition;
    }

    final public function getEndPosition(): Position
    {
        return $this->endPosition;
    }

    /**
     * @param array<array-key,Position> $path
     */
    abstract public function print(array $path): void;

    abstract protected static function init(): self;

    abstract protected static function createMap(
        int      $height,
        int      $width,
        array    $grid,
        Position $startPosition,
        Position $endPosition,
    ): Map;

    abstract protected static function initDefaultNode(Position $position, bool $isTraversable): Node;

    /**
     * @param array<array-key,Node> $grid
     * @throws Exception
     */
    final protected static function checkIsValid(array $grid, Position $startPosition, Position $endPosition): void
    {
        self::checkGrid(grid: $grid);
        self::checkStartPosition(grid: $grid, startPosition: $startPosition);
        self::checkEndPosition(grid: $grid, endPosition: $endPosition);
    }

    /**
     * @param array<array-key,Node> $grid
     * @throws Exception
     */
    private static function checkGrid(array $grid): void
    {
        if (count($grid) === 0) {
            throw new Exception('Map grid is empty');
        }
    }

    /**
     * @param array<array-key,Node> $grid
     * @throws Exception
     */
    private static function checkStartPosition(array $grid, ?Position $startPosition): void
    {
        if ($startPosition === null) {
            throw new Exception('No start position on the map');
        }

        $startPositionInGrid = current(array_filter(
            $grid,
            static fn(Node $node): bool => $node->getPosition() === $startPosition
        ));
        if (!$startPositionInGrid) {
            throw new Exception('Start position out of the map');
        }
    }

    /**
     * @param array<array-key,Node> $grid
     * @throws Exception
     */
    private static function checkEndPosition(array $grid, ?Position $endPosition): void
    {
        if ($endPosition === null) {
            throw new Exception('No end position on the map');
        }

        $endPositionInGrid = current(array_filter(
            $grid,
            static fn(Node $node): bool => $node->getPosition() === $endPosition
        ));
        if (!$endPositionInGrid) {
            throw new Exception('End position out of the map');
        }
    }
}

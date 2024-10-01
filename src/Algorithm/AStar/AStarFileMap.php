<?php

declare(strict_types=1);

namespace CodinGame\Algorithm\AStar;

use CodinGame\Algorithm\FileMap;
use CodinGame\Algorithm\Map;
use CodinGame\Algorithm\Node;
use CodinGame\Algorithm\Position;

final class AStarFileMap extends FileMap
{
    protected static function createMap(
        int $height,
        int $width,
        array $grid,
        Position $startPosition,
        Position $endPosition
    ): Map {
        return new self(
            height: $height,
            width: $width,
            grid: $grid,
            startPosition: $startPosition,
            endPosition: $endPosition
        );
    }

    protected static function initDefaultNode(Position $position, bool $isTraversable): Node
    {
        return AStarNode::init(position: $position, traversable: $isTraversable, cost: AStarCost::init());
    }
}

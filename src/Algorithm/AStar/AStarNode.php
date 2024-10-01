<?php

declare(strict_types=1);

namespace CodinGame\Algorithm\AStar;

use CodinGame\Algorithm\Cost;
use CodinGame\Algorithm\Node;
use CodinGame\Algorithm\Position;

final class AStarNode extends Node
{
    public static function init(
        Position $position,
        bool $traversable = true,
        ?Cost $cost = null,
        ?Node $parentNode = null
    ): self {
        return new self(
            position: $position,
            traversable: $traversable,
            cost: $cost ?? AStarCost::init(),
            parentNode: $parentNode
        );
    }

    public function addCost(Node $parentNode, Position $endPosition): void
    {
        $heuristic = $this->traversable ?
            Position::calculateDistance(from: $this->position, to: $endPosition) :
            Cost::INFINITE_COST;

        $distanceFromStartNode = $this->traversable ?
            $parentNode->cost->getG() + Position::calculateDistance(from: $parentNode->position, to: $this->position) :
            Cost::INFINITE_COST;

        $this->cost = AStarCost::init(g: $distanceFromStartNode, h: $heuristic);
    }
}

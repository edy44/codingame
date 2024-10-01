<?php

declare(strict_types=1);

namespace CodinGame\Algorithm\Dijkstra;

use CodinGame\Algorithm\Cost;
use CodinGame\Algorithm\Node;
use CodinGame\Algorithm\Position;

final class DijkstraNode extends Node
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
            cost: $cost ?? DijkstraCost::init(),
            parentNode: $parentNode
        );
    }

    public function addCost(Node $parentNode, Position $endPosition): void
    {
        $distanceFromStartNode = $this->traversable ?
            $this->parentNode->cost->getG() + Position::calculateDistance(from: $this->parentNode->position, to: $this->position) :
            Cost::INFINITE_COST;

        $this->cost = DijkstraCost::init(g: $distanceFromStartNode);
    }
}

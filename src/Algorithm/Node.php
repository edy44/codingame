<?php

declare(strict_types=1);

namespace CodinGame\Algorithm;

abstract class Node
{
    protected function __construct(
        protected readonly Position $position,
        protected readonly bool $traversable,
        protected ?Cost $cost,
        protected ?Node $parentNode
    ) {
    }

    abstract public static function init(
        Position $position,
        bool $traversable = true,
        ?Cost $cost = null,
        ?Node $parentNode = null
    ): self;

    abstract public function addCost(Node $parentNode, Position $endPosition): void;

    final public static function findNodeWithLowerTotalCost(array $nodes): ?Node
    {
        usort(
            $nodes,
            static fn(Node $a, Node $b) => $a->getCost()->getTotalCost() < $b->getCost()->getTotalCost() ? -1 : 1
        );

        return current($nodes) ?: null;
    }

    final public function addParentNode(Node $parentNode): void
    {
        $this->parentNode = static::init(
            position: $parentNode->getPosition(),
            traversable: $parentNode->traversable,
            cost: $parentNode->getCost(),
            parentNode: $parentNode->getParentNode()
        );
    }

    final public function getPosition(): Position
    {
        return $this->position;
    }

    final public function isTraversable(): bool
    {
        return $this->traversable;
    }

    final public function getCost(): Cost
    {
        return $this->cost;
    }

    final public function hasParentNode(): bool
    {
        return $this->parentNode !== null;
    }

    final public function getParentNode(): ?Node
    {
        return $this->parentNode;
    }
}

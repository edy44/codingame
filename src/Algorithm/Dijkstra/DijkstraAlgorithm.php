<?php

declare(strict_types=1);

namespace CodinGame\Algorithm\Dijkstra;

use CodinGame\Algorithm\Algorithm;
use CodinGame\Algorithm\Node;
use CodinGame\Algorithm\Position;

final class DijkstraAlgorithm extends Algorithm
{
    protected function initVariables(): void
    {
        $this->currentNode = DijkstraNode::init(position: $this->map->getStartPosition(), cost: DijkstraCost::init());
        $this->executionTime = null;
        $this->openList[] = $this->currentNode;
        $this->closeList = [];
        $this->minPath = [];
    }

    protected function configureChildrenNodes(array $childrenNodes): void
    {
        foreach ($childrenNodes as $childrenNode) {
            if ($this->isAlreadyNodeInCloseList(node: $childrenNode)) {
                continue;
            }

            $childrenNode->addParentNode(parentNode: $this->currentNode);
            $childrenNode->addCost(parentNode: $this->currentNode, endPosition: $this->map->getEndPosition());
            if ($this->isAlreadyNodeInOpenList(node: $childrenNode)) {
                if ($this->isTotalCostLowerThanCurrentNode(node: $childrenNode)) {
                    $this->actualizeNodeInOpenList(node: $childrenNode);
                }
            } else {
                $this->openList[] = $childrenNode;
            }
        }
    }

    private function isTotalCostLowerThanCurrentNode(Node $node): bool
    {
        return $node->getCost()->getTotalCost() < $this->currentNode->getCost()->getTotalCost();
    }

    private function actualizeNodeInOpenList(Node $node): void
    {
        $index = $this->getNodeIndexInOpenList(node: $node);

        if($index !== null) {
            $this->openList[$index] = $node;
        }
    }

    private function getNodeIndexInOpenList(Node $node): ?int
    {
        foreach ($this->openList as $index => $openListNode) {
            if (Position::arePositionsEquals(position1: $node->getPosition(), position2: $openListNode->getPosition())) {
                return $index;
            }
        }

        return null;
    }
}

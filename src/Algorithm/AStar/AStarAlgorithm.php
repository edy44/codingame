<?php

declare(strict_types=1);

namespace CodinGame\Algorithm\AStar;

use CodinGame\Algorithm\Algorithm;

final class AStarAlgorithm extends Algorithm
{
    protected function initVariables(): void
    {
        $this->currentNode = AStarNode::init(position: $this->map->getStartPosition(), cost: AStarCost::init());
        $this->executionTime = null;
        $this->openList[] = $this->currentNode;
        $this->closeList = [];
        $this->minPath = [];
    }

    /**
     * @inheritDoc
     */
    protected function configureChildrenNodes(array $childrenNodes): void
    {
        foreach ($childrenNodes as $childrenNode) {
            if ($this->isAlreadyNodeInCloseList($childrenNode)) {
                continue;
            }

            $childrenNode->addParentNode(parentNode: $this->currentNode);
            $childrenNode->addCost(parentNode: $this->currentNode, endPosition: $this->map->getEndPosition());
            if ($this->isAlreadyNodeInOpenList($childrenNode)) {
                continue;
            }
            $this->openList[] = $childrenNode;
        }
    }
}

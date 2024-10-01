<?php

declare(strict_types=1);

namespace CodinGame\Algorithm;

use Exception;

abstract class Algorithm
{
    final public const MAX_ITERATIONS = 500;

    /** @var array<array-key,Node> */
    protected array $openList = [];

    /** @var array<array-key,Node> */
    protected array $closeList = [];

    /** @var array<array-key,Position> */
    protected array $minPath = [];

    protected ?Node $currentNode = null;

    protected ?float $executionTime = null;

    /**
     * @param array<array-key,Position> $authorizedMoves
     */
    public function __construct(
        protected readonly Map   $map,
        private readonly array $authorizedMoves,
        private readonly int   $maxIterations = self::MAX_ITERATIONS,
    )
    {
    }

    final public function print(): void
    {
        $this->map->print(path: $this->minPath);

        echo sprintf("Algorithm %s\n", static::class);
        echo sprintf("Execution Time: %s\n", $this->executionTime);
        echo sprintf("Number of Nodes: %d\n", count($this->map->getGrid()));
        echo sprintf("Number of Tries: %d\n", count($this->closeList));
        echo sprintf("Minimum path found in %d Moves\n\n", count($this->minPath));

        foreach ($this->minPath as $moveNumber => $position) {
            echo sprintf(
                "Move %d - Position : (x: %d, y: %d)\n",
                $moveNumber + 1, $position->getX(), $position->getY()
            );
        }
    }

    /**
     * @throws Exception
     */
    final public function execute(): void
    {
        $startTime = microtime(true);
        $this->initVariables();

        $iterations = 0;
        while (
            $iterations < $this->maxIterations &&
            count($this->openList) !== 0 &&
            !Position::arePositionsEquals($this->currentNode->getPosition(), $this->map->getEndPosition())
        ) {
            $this->removeFromOpenList($this->currentNode);
            $this->closeList[] = $this->currentNode;

            $childrenNodes = $this->getChildrenNodes();
            $this->configureChildrenNodes($childrenNodes);

            $this->currentNode = Node::findNodeWithLowerTotalCost($this->openList);
            ++$iterations;
        }

        $this->calculateMinPath();
        $this->executionTime = microtime(true) - $startTime;
    }

    abstract protected function initVariables(): void;

    /**
     * @param array<array-key,Node> $childrenNodes
     * @throws Exception
     */
    abstract protected function configureChildrenNodes(array $childrenNodes): void;

    /**
     * @return array<array-key,Node>
     */
    final public function getMinPath(): array
    {
        return $this->minPath;
    }

    final public function getExecutionTime(): ?float
    {
        return $this->executionTime;
    }

    final protected function isAlreadyNodeInCloseList(Node $node): bool
    {
        return array_filter(
                $this->closeList,
                static fn (Node $closeNode): bool =>
                Position::arePositionsEquals($node->getPosition(), $closeNode->getPosition())
            ) !== [];
    }

    final protected function isAlreadyNodeInOpenList(Node $node): bool
    {
        return array_filter(
                $this->openList,
                static fn (Node $openNode): bool =>
                Position::arePositionsEquals($node->getPosition(), $openNode->getPosition())
            ) !== [];
    }

    private function removeFromOpenList(Node $node): void {

        $node = current(array_filter(
            $this->openList,
            static fn (Node $openNode): bool =>
            Position::arePositionsEquals($openNode->getPosition(), $node->getPosition())
        ));

        if ($node) {
            $key = array_search($node, $this->openList, true);
            unset($this->openList[$key]);
        }
    }

    /**
     * @return array<array-key,Node>
     * @throws Exception
     */
    private function getChildrenNodes(): array
    {
        $childrenNodes = [];

        foreach ($this->authorizedMoves as $authorizedMove) {
            $childrenNode = $this->getChildrenNodeFromCurrentPosition(move: $authorizedMove);
            if ($childrenNode === null) {
                continue;
            }
            $childrenNodes[] = $childrenNode;
        }

        return $childrenNodes;
    }

    /**
     * @throws Exception
     */
    private function getChildrenNodeFromCurrentPosition(Position $move): ?Node
    {
        $childrenPosition = Position::getNewPositionWithMove($this->currentNode->getPosition(), $move);

        return current(array_filter(
            $this->map->getGrid(),
            static fn (Node $node): bool =>
                Position::arePositionsEquals($childrenPosition, $node->getPosition()) && $node->isTraversable()
        )) ?: null;
    }

    private function calculateMinPath(): void
    {
        $minPath = [];
        $nodeToAdd = $this->currentNode;
        $minPath[] = $nodeToAdd->getPosition();

        while ($nodeToAdd->getParentNode()->hasParentNode()) {
            $nodeToAdd = $nodeToAdd->getParentNode();
            $minPath[] = $nodeToAdd->getPosition();
        }

        /** @var array<array-key,Position> $minPath */
        $this->minPath = array_reverse($minPath);
    }
}
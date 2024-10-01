<?php

namespace CodinGame\Tests\Functional\Features\Bootstrap\Algorithm;

use Behat\Behat\Context\Context;
use CodinGame\Algorithm\AuthorizedMoves;
use CodinGame\Algorithm\Dijkstra\DijkstraAlgorithm;
use CodinGame\Algorithm\Dijkstra\DijkstraFileMap;
use Exception;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class DijkstraContext implements Context
{
    /** @var DijkstraAlgorithm  */
    private DijkstraAlgorithm $dijkstra;

    /**
     * @Given A file path :filePath which contains the map
     * @throws Exception
     */
    public function aFilePathWhichContainsTheMap(string $filePath): void
    {
        $rootDir = __DIR__ . '/Maps/';
        $dijkstraMap = DijkstraFileMap::initFromFile(filePath: $rootDir . $filePath);

        $authorizedMoves = AuthorizedMoves::unidirectionalMoves();
        $this->dijkstra = new DijkstraAlgorithm(map: $dijkstraMap, authorizedMoves: $authorizedMoves);
    }

    /**
     * @When I execute the AStar Algorithm
     * @throws Exception
     */
    public function iExecuteTheAStarAlgorithm(): void
    {
        $this->dijkstra->execute();
    }

    /**
     * @Then The short path contains :result moves
     */
    public function theShortPathContainsMoves(int $result): void
    {
        Assert::assertLessThanOrEqual($result, count($this->dijkstra->getMinPath()));
    }

    /**
     * @Then Execution time is lower than :executionTime seconds
     */
    public function executionTimeIsLowerThanSeconds(float $executionTime): void
    {
        Assert::assertLessThanOrEqual($executionTime, $this->dijkstra->getExecutionTime());
    }
}

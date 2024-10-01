<?php

namespace CodinGame\Tests\Functional\Features\Bootstrap\Algorithm;

use Behat\Behat\Context\Context;
use CodinGame\Algorithm\AStar\AStarAlgorithm;
use CodinGame\Algorithm\AStar\AStarFileMap;
use CodinGame\Algorithm\AuthorizedMoves;
use CodinGame\Algorithm\Map;
use Exception;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class AStarContext implements Context
{
    private AStarAlgorithm $AStar;

    private Map $map;

    /**
     * @Given A file path :filePath which contains the map
     * @throws Exception
     */
    public function aFilePathWhichContainsTheMap(string $filePath): void
    {
        $rootDir = __DIR__ . '/Maps/';
        $this->map = AStarFileMap::initFromFile(filePath: $rootDir . $filePath);
        $this->AStar = new AStarAlgorithm();
    }

    /**
     * @When I execute the AStar Algorithm
     * @throws Exception
     */
    public function iExecuteTheAStarAlgorithm(): void
    {
        $this->AStar->execute(map: $this->map, authorizedMoves: AuthorizedMoves::unidirectionalMoves());
    }

    /**
     * @Then The short path contains :result moves
     */
    public function theShortPathContainsMoves(int $result): void
    {
        Assert::assertLessThanOrEqual($result, count($this->AStar->getMinPath()));
    }

    /**
     * @Then Execution time is lower than :executionTime seconds
     */
    public function executionTimeIsLowerThanSeconds(float $executionTime): void
    {
        Assert::assertLessThanOrEqual($executionTime, $this->AStar->getExecutionTime());
    }
}

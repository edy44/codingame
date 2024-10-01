<?php

namespace CodinGame\Tests\Functional\Features\Bootstrap\Algorithm;

use Behat\Behat\Context\Context;
use CodinGame\Algorithm\AStar\AStarAlgorithm;
use CodinGame\Algorithm\AStar\AStarFileMap;
use CodinGame\Algorithm\AuthorizedMoves;
use Exception;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class AStarContext implements Context
{
    /** @var AStarAlgorithm */
    private AStarAlgorithm $AStar;

    /**
     * @Given A file path :filePath which contains the map
     * @throws Exception
     */
    public function aFilePathWhichContainsTheMap(string $filePath): void
    {
        $rootDir = __DIR__ . '/Maps/';
        $aStarMap = AStarFileMap::initFromFile(filePath: $rootDir . $filePath);

        $authorizedMoves = AuthorizedMoves::unidirectionalMoves();
        $this->AStar = new AStarAlgorithm(map: $aStarMap, authorizedMoves: $authorizedMoves);
    }

    /**
     * @When I execute the AStar Algorithm
     * @throws Exception
     */
    public function iExecuteTheAStarAlgorithm(): void
    {
        $this->AStar->execute();
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

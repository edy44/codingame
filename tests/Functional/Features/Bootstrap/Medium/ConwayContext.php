<?php

namespace Codingame\Tests\Functional\Features\Bootstrap\Medium;

use Behat\Behat\Context\Context;
use CodinGame\Medium\Conway\Conway;
use PHPUnit\Framework\Assert;

/**
 * Class ConwayContext
 * @package Functional\Features\Bootstrap\Medium
 */
class ConwayContext implements Context
{
    /**
     * @var Conway
     */
    private Conway $conway;

    /**
     * @Given A start number :r
     * @param int $r
     */
    public function aStartNumber(int $r)
    {
        $this->conway = new Conway(intval($r));
    }

    /**
     * @When I execute the Conway's Suite until the line :l
     * @param int $l
     */
    public function iExecuteTheConwaysSuiteUntilTheLine(int $l)
    {
        $this->conway->execute($l);
    }

    /**
     * @Then I return the following line :result
     * @param string $result
     */
    public function iReturnTheFollowingLine(string $result)
    {
        Assert::assertEquals($result, $this->conway->getResult());
    }
}

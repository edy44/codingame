<?php

namespace Codingame\Tests\Functional\Features\Bootstrap\Medium;

use Behat\Behat\Context\Context;
use CodinGame\Medium\ThereIsNoSpoon\Grid;
use PHPUnit\Framework\Assert;

/**
 * Class ThereIsNoSpoonContext
 * @package Functional\Features\Bootstrap\Medium
 */
class ThereIsNoSpoonContext implements Context
{
    /**
     * @var Grid
     */
    private Grid $grid;

    /**
     * @Given A Grid with a width :width and a length :length with the following values :grid
     * @param string $width
     * @param string $length

     */
    public function aGridWithAWidthAndALengthWithTheFollowingValuesAnd(string $width, string $length, string $grid)
    {
        $array = [];
        $lines = explode(';', $grid);
        foreach ($lines as $key => $line) {
            $line = explode(',', $line);
            $array[$key] = $line;
        }

        $this->grid = new Grid($width, $length, $array);
    }

    /**
     * @When I find the node positions
     */
    public function iFindTheNodePositions()
    {
        $this->grid->setResults();
    }

    /**
     * @Then I return the following string :result
     * @param string $result
     */
    public function iReturnTheFollowingString(string $result)
    {
        $result = $lines = explode(',', $result);
        Assert::assertEquals($result, $this->grid->getResults());
    }
}

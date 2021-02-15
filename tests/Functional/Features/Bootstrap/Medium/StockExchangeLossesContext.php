<?php

namespace CodinGame\Tests\Functional\Features\Bootstrap\Medium;

use Behat\Behat\Context\Context;
use CodinGame\Medium\StockExchangeLosses\StockExchangeLosses;
use PHPUnit\Framework\Assert;

/**
 * Class StockExchangeLossesContext
 * @package CodinGame\Tests\Functional\Features\Bootstrap\Medium
 */
class StockExchangeLossesContext implements Context
{
    /**
     * @var StockExchangeLosses
     */
    private StockExchangeLosses $stockExchangesLosses;

    /**
     * @Given Stock exchange values :values
     * @param string $values
     */
    public function stockExchangeValues(string $values)
    {
        $values = explode(' ', $values);
        $this->stockExchangesLosses = new StockExchangeLosses($values);
    }

    /**
     * @When I find the maximal loss
     */
    public function iFindTheMaximalLoss()
    {
        $this->stockExchangesLosses->findMaximalLoss();
    }

    /**
     * @Then I return the following value :maxLoss
     * @param string $maxLoss
     */
    public function iReturnTheFollowingValue(string $maxLoss)
    {
        Assert::assertEquals($maxLoss, $this->stockExchangesLosses->getMaxLoss());
    }
}

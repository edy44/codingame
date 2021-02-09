<?php

namespace Codingame\Tests\Functional\Features\Bootstrap\Medium;

use Behat\Behat\Context\Context;
use CodinGame\Medium\Gift\Gift;
use PHPUnit\Framework\Assert;

/**
 * Class GiftContext
 * @package Codingame\Tests\Functional\Features\Bootstrap\Medium
 */
class GiftContext implements Context
{
    /**
     * @var Gift
     */
    private Gift $gift;

    /**
     * @Given An amount :amount for a gift and a list of participants donation :donations
     * @param int $amount
     * @param string $donations
     */
    public function anAmountForAGiftAndAListOfParticipantsDonation(int $amount, string $donations)
    {
        $donations = explode(',', $donations);
        $this->gift = new Gift($amount, $donations);
    }

    /**
     * @When Executing the algorithm
     */
    public function executingTheAlgorithm()
    {
        $this->gift->execute();
    }

    /**
     * @Then The better distribution between participants is :results
     * @param string $results
     */
    public function theBetterDistributionBetweenParticipantsIs(string $results)
    {
        $results = explode(',', $results);
        Assert::assertEquals($results, $this->gift->getResults());
    }
}

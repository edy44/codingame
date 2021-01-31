<?php

namespace CodinGame\Tests\Functional\Features\Bootstrap\Medium;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use CodinGame\Medium\War\War;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class WarContext implements Context
{
    /**
     * @var War
     */
    private War $war;

    /**
     * @Given Player 1 withs cards :cardsp1 and Player 2 with cards :cardsp2
     * @param string $cardsp1
     * @param string $cardsp2
     */
    public function playerWithsCardsAndPlayerWithCards(string $cardsp1, string $cardsp2)
    {
        $cardsp1 = explode(',', $cardsp1);
        $cardsp2 = explode(',', $cardsp2);
        $cardsPlayers = compact('cardsp1', 'cardsp2');
        $this->war = new War($cardsPlayers);
    }

    /**
     * @When /^They play War's Game$/
     */
    public function theyPlayWarSGame()
    {
        $this->war->playGame();
    }

    /**
     * @Then The winner is Player :winner in :turns turns
     * @param string $winner
     * @param int $turns
     */
    public function theWinnerIsPlayerInTurns(string $winner, int $turns)
    {
        Assert::assertEquals($winner, $this->war->getWinner());
        Assert::assertEquals($turns, $this->war->getTurns());
    }

    /**
     * @Then No winner and the answer is :winner
     * @param string $winner
     */
    public function noWinnerAndTheAnswerIs(string $winner)
    {
        Assert::assertEquals($winner, $this->war->getWinner());
    }
}

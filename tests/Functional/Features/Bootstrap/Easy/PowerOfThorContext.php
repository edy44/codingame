<?php

namespace CodinGame\Tests\Functional\Features\Bootstrap\Easy;

use Behat\Behat\Context\Context;
use CodinGame\Easy\PowerOfThor\PowerOfThor;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class PowerOfThorContext implements Context
{
    /**
     * @var PowerOfThor
     */
    private PowerOfThor $thor;
    /**
     * @var string
     */
    private string $direction;

    /**
     * @Given Thor at initial position X :initialTX and Y :initialTY, and the lightning at ending position X :lightX and Y :lightY
     * @param $initialTX
     * @param $initialTY
     * @param $lightX
     * @param $lightY
     */
    public function thorAtInitialPositionXAndYAndTheLightningAtEndingPositionXAndY(
        int $initialTX,
        int $initialTY,
        int $lightX,
        int $lightY
    ): void {
        $this->thor = new PowerOfThor($initialTX, $initialTY, $lightX, $lightY);
    }

    /**
     * @When Thor moves with :remainingTurns turns remaining
     * @param $remainingTurns
     */
    public function thorMovesDuringTurns(int $remainingTurns): void
    {
        $this->direction = $this->thor->findDirection($remainingTurns);
    }

    /**
     * @Then Thor moves to direction :direction
     * @param int $direction
     */
    public function thorMovesToDirection(string $direction): void
    {
        Assert::assertEquals($direction, $this->direction);
    }
}

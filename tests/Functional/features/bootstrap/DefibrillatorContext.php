<?php

namespace CodinGame\Tests\Functional\Features\Bootstrap;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use CodinGame\Defibrillator\Defibrillator;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class DefibrillatorContext implements Context
{
    /**
     * @var Defibrillator
     */
    private Defibrillator $defib;
    /**
     * @var string
     */
    private string $name;

    /**
     * @Given the Defibrillator's list :defibs
     * @param string $defibs
     */
    public function theDefibrillatorsList(string $defibs)
    {
        $this->defib = new Defibrillator($defibs);
    }

    /**
     * @When searching the closest Defibrillator near a longitude :lon and a latitude :lat
     * @param string $lon
     * @param string $lat
     */
    public function searchingTheClosestDefibrillatorNearALongitudeAndALatitude(string $lon, string $lat)
    {
        $this->name = $this->defib->findClosest($lon, $lat);
    }

    /**
     * @Then get the following name :name
     * @param string $name
     */
    public function getTheFollowingName(string $name)
    {
        Assert::assertEquals($name, $this->name);
    }
}

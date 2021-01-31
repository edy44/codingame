<?php

namespace CodinGame\Tests\Functional\Features\Bootstrap\Easy;

use Behat\Behat\Context\Context;
use CodinGame\Easy\ChuckNorris\ChuckNorris;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class ChuckNorrisContext implements Context
{
    /**
     * @var string
     */
    private string $message;

    /**
     * @var string
     */
    private string $code;

    /**
     * @Given a string :message
     * @param $message
     */
    public function aString($message)
    {
        $this->message = $message;
    }

    /**
     * @When I encrypt with Chuck Norris code
     */
    public function iEncryptWithChuckNorrisCode()
    {
        $this->code = (new ChuckNorris())->convertStringToChuckNorris($this->message);
    }

    /**
     * @Then I get the following code :code
     * @param $code
     */
    public function iGetTheFollowingCode($code)
    {
        Assert::assertEquals($code, $this->code);
    }
}

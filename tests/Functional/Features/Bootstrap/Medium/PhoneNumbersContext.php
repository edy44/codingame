<?php

namespace CodinGame\Tests\Functional\Features\Bootstrap\Medium;

use Behat\Behat\Context\Context;
use CodinGame\Medium\PhoneNumbers\PhoneNumbers;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class PhoneNumbersContext implements Context
{
    /**
     * @var PhoneNumbers
     */
    private PhoneNumbers $phoneNumbers;

    /**
     * @Given A list of telephone numbers :list
     * @param string $list
     */
    public function aListOfTelephoneNumbers(string $list)
    {
        $list = explode(',', $list);
        $this->phoneNumbers = new PhoneNumbers($list);
    }

    /**
     * @When /^Telephone numbers are analysed$/
     */
    public function telephoneNumbersAreAnalysed()
    {
        $this->phoneNumbers->analyzed();
    }

    /**
     * @Then The numbers of elements is :count
     * @param int $count
     */
    public function theNumbersOfElementsIs(int $count)
    {
        Assert::assertEquals($count, $this->phoneNumbers->getCount());
    }
}

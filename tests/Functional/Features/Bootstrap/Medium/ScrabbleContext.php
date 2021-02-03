<?php

namespace CodinGame\Tests\Functional\Features\Bootstrap\Medium;

use Behat\Behat\Context\Context;
use CodinGame\Medium\Scrabble\Scrabble;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class ScrabbleContext implements Context
{
    /**
     * @var Scrabble
     */
    private Scrabble $scrabble;

    /**
     * @Given A dictionnary of words :dictionnary
     * @param string $dictionnary
     */
    public function aDictionnaryOfWords(string $dictionnary): void
    {
        $dictionnary = explode(',', $dictionnary);
        $this->scrabble = new Scrabble($dictionnary);
    }

    /**
     * @When I find the best combination of letters :letters
     * @param string $letters
     */
    public function iFindTheBestCombinationOfLetters(string $letters)
    {
        $this->scrabble->findCombinations($letters);
    }

    /**
     * @Then I return the following word :word
     * @param string $word
     */
    public function iReturnTheFollowingWord(string $word)
    {
        Assert::assertEquals($word, $this->scrabble->getBestWord());
    }
}

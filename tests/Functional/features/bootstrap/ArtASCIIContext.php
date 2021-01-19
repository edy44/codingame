<?php

namespace CodinGame\Tests\Functional\Features\Bootstrap;

use Behat\Behat\Context\Context;
use CodinGame\ArtASCII\ArtASCII;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class ArtASCIIContext implements Context
{
    /**
     * @var ArtASCII
     */
    private ArtASCII $artASCII;
    /**
     * @var array
     */
    private array $result;

    /**
     * @Given The string with height :height and width :width in characters ASCII :ascii
     * @param $height
     * @param $width
     * @param $ascii
     */
    public function theStringWithHeightAndWidthInCharactersAscii(int $height, int $width, string $ascii)
    {
        $asciiArray = explode(',', $ascii);
        $this->artASCII = new ArtASCII($height, $width, $asciiArray);
    }

    /**
     * @When tranforming the following text :text in ASCII art
     * @param string $text
     */
    public function tranformingTheFollowingTextInAsciiArt(string $text)
    {
        $this->result = $this->artASCII->transform($text);
    }

    /**
     * @Then returning the following text in ASCII art :result
     * @param string $result
     */
    public function returningTheFollowingTextInAsciiArt(string $result)
    {
        Assert::assertEquals(explode(',', $result), $this->result);
    }
}

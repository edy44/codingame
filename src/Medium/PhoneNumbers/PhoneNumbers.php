<?php

namespace CodinGame\Medium\PhoneNumbers;

/**
 * Class PhoneNumbers
 * @package CodinGame\Medium\PhoneNumbers
 */
class PhoneNumbers
{
    /**
     * @var array
     */
    private array $list;
    /**
     * @var array
     */
    private array $network;
    /**
     * @var int
     */
    private int $count;
    /**
     * @var int
     */
    private int $position;

    /**
     * PhoneNumbers constructor.
     * @param array $list
     */
    public function __construct(array $list)
    {
        $this->list = $list;
        $this->network = [];
        $this->count = 0;
        $this->position = 0;
    }

    public function analyzed(): void
    {
        foreach ($this->list as $phoneNumber) {
            $this->analyzedNumber($phoneNumber);
        }
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param string $phoneNumber
     */
    private function analyzedNumber(string $phoneNumber): void
    {
        $this->position = 0;
        $this->network = $this->buildNetwork($this->network, $phoneNumber);
    }

    /**
     * @param array $network
     * @param string $phoneNumber
     * @return array
     */
    private function buildNetwork(array $network, string $phoneNumber): array
    {
        if ($this->position === strlen($phoneNumber)) {
            return $network;
        }

        $character = $phoneNumber[$this->position];
        $this->position++;

        if (array_key_exists($character, $network)) {
            $branch = $network[$character];
        } else {
            $branch = [];
            $this->count++;
        }

        $network[$character] = $this->buildNetwork($branch, $phoneNumber);

        return $network;
    }
}

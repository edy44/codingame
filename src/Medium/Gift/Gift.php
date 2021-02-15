<?php

namespace CodinGame\Medium\Gift;

use JetBrains\PhpStorm\Pure;

/**
 * Class Gift
 * @package CodinGame\Medium\Gift
 */
class Gift
{
    /**
     * @var string
     */
    private const IMPOSSIBLE = 'IMPOSSIBLE';
    /**
     * @var int
     */
    private int $amount;
    /**
     * @var int[]
     */
    private array $donations;
    /**
     * @var int[]
     */
    private array $results;

    /**
     * Gift constructor.
     * @param int $amount
     * @param int[] $donations
     */
    public function __construct(int $amount, array $donations)
    {
        $this->amount = $amount;
        $this->donations = $donations;
        $this->results = [];
    }

    /**
     * @return int[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    public function execute(): void
    {
        if ($this->areEnoughDonations()) {
            sort($this->donations);
            $this->averageAmounts($this->amount, $this->donations);
        } else {
            array_push($this->results, self::IMPOSSIBLE);
        }
    }

    /**
     * @return bool
     */
    #[Pure] private function areEnoughDonations(): bool
    {
        return array_sum($this->donations) >= $this->amount;
    }

    /**
     * @param int $amount
     * @param int[] $donations
     */
    private function averageAmounts(int $amount, array $donations): void
    {
        while ($amount > 0) {
            $count = count($donations);
            $minAmount  = min($donations);
            $average = floor($amount / $count);

            $donation = ($minAmount < $average) ? $minAmount : intval($average);
            $donation += ($count === 1) ? $amount % $count : 0;

            array_push($this->results, intval($donation));
            array_shift($donations);

            $amount -= $donation;
        }
    }
}

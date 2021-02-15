<?php

namespace CodinGame\Medium\StockExchangeLosses;

/**
 * Class StockExchangeLosses
 * @package CodinGame\Medium\StockExchangeLosses
 */
class StockExchangeLosses
{
    /**
     * @var int[]
     */
    private array $values;
    /**
     * @var int
     */
    private int $maxLoss;

    /**
     * StockExchangeLosses constructor.
     * @param int[] $values
     */
    public function __construct(array $values)
    {
        $this->values = $values;
        $this->maxLoss = 0;
    }

    public function findMaximalLoss(): void
    {
        $count = 0;
        while (!empty($this->values) && $count < 100) {
            $maxValue = max($this->values);
            $maxIndex = array_search($maxValue, $this->values);
            $this->deleteAllValues($maxValue);

            $minArray = array_slice($this->values, $maxIndex, null, true);
            if (!empty($minArray)) {
                $minValue = min($minArray);
                $this->deleteAllValues($minValue);

                $this->setMaxLoss($minValue, $maxValue);
            }

            $count++;
        }
    }

    /**
     * @return int
     */
    public function getMaxLoss(): int
    {
        return $this->maxLoss;
    }

    /**
     * @param int $minValue
     * @param int $maxValue
     */
    private function setMaxLoss(int $minValue, int $maxValue): void
    {
        $loss = intval($minValue) - intval($maxValue);
        if ($this->maxLoss > $loss) {
            $this->maxLoss = $loss;
        }
    }

    /**
     * @param int $value
     */
    private function deleteAllValues(int $value): void
    {
        while (array_search($value, $this->values) !== false) {
            unset($this->values[array_search($value, $this->values)]);
        }
    }
}

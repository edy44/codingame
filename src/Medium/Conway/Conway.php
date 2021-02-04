<?php

namespace CodinGame\Medium\Conway;

use JetBrains\PhpStorm\Pure;

/**
 * Class Conway
 * @package CodinGame\Medium\Conway
 */
class Conway
{
    /**
     * @var int
     */
    private int $startNumber;
    /**
     * @var int
     */
    private int $lastLine;
    /**
     * @var array
     */
    private array $results;

    /**
     * Conway constructor.
     * @param int $startNumber
     */
    public function __construct(int $startNumber)
    {
        $this->startNumber = $startNumber;
        $this->lastLine = 0;
        $this->results[0] = [$startNumber];
    }

    /**
     * @return string
     */
    #[Pure] public function getResult(): string
    {
        return implode(' ', $this->results[$this->lastLine]);
    }

    /**
     * @param int $lastLine
     */
    public function execute(int $lastLine): void
    {
        $this->lastLine = $lastLine - 1;
        $line = 1;

        while ($line <= $this->lastLine) {
            $this->addResultForNewLine($line);
            $line++;
        }
    }

    /**
     * @param int $line
     */
    private function addResultForNewLine(int $line): void
    {
        $count = count($this->results) - 1;
        $lastResult = $this->results[$count];

        $newResult = $this->deduceNewResult($lastResult);
        $this->results[$line] = $newResult;
    }

    /**
     * @param array $lastResult
     * @return array
     */
    private function deduceNewResult(array $lastResult): array
    {
        $arrayN = $lastResult;

        $arrayN1 = $lastResult;
        array_shift($arrayN1);
        array_push($arrayN1, -1);

        $newResult = [];
        $count = 1;
        array_map(function ($valueN, $valueN1) use (&$newResult, &$count) {
            if ($valueN !== $valueN1) {
                array_push($newResult, $count);
                array_push($newResult, $valueN);
                $count = 1;
            } else {
                $count++;
            }
        }, $arrayN, $arrayN1);

        return $newResult;
    }
}

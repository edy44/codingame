<?php

declare(strict_types=1);

namespace CodinGame\Algorithm;

abstract class Cost
{
    final public const INFINITE_COST = null;

    /**
     * @param int|null $g Distance entre le noeud et le point de départ
     */
    protected function __construct(protected ?int $g)
    {
    }

    abstract public static function init(?int $g = 0): self;

    abstract public function getTotalCost(): ?int;

    final public function getG(): ?int
    {
        return $this->g;
    }
}

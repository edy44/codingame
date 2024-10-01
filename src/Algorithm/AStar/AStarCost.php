<?php

declare(strict_types=1);

namespace CodinGame\Algorithm\AStar;

use CodinGame\Algorithm\Cost;

final class AStarCost extends Cost
{
    /**
     * @param int|null $g Distance entre le noeud et le point de départ
     * @param int|null $h Distance entre le noeud et le point d'arrivée
     */
    protected function __construct(protected ?int $g, protected readonly ?int $h)
    {
        parent::__construct(g: $g);
    }

    public static function init(?int $g = 0, ?int $h = 0): self
    {
        return new self(g: $g, h: $h);
    }

    public function getTotalCost(): ?int
    {
        return $this->g ? $this->g + $this->h : null;
    }
}

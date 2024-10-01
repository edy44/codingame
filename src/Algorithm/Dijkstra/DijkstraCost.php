<?php

declare(strict_types=1);

namespace CodinGame\Algorithm\Dijkstra;

use CodinGame\Algorithm\Cost;

final class DijkstraCost extends Cost
{
    public static function init(?int $g = 0): Cost
    {
        return new self(g: $g);
    }

    public function getTotalCost(): ?int
    {
        return $this->g;
    }
}

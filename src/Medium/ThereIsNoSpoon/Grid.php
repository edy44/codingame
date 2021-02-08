<?php

namespace CodinGame\Medium\ThereIsNoSpoon;

/**
 * Class Grid
 * @package CodinGame\Medium\ThereIsNoSpoon
 */
class Grid
{
    /**
     * @var int
     */
    private int $width;
    /**
     * @var int
     */
    private int $height;
    /**
     * @var array
     */
    private array $grid;
    /**
     * @var array
     */
    private array $results;

    /**
     * Grid constructor.
     * @param int $width
     * @param int $height
     * @param array $grid
     */
    public function __construct(int $width, int $height, array $grid)
    {
        $this->width = $width;
        $this->height = $height;
        $this->initGrid($grid);
        $this->results = [];
    }

    /**
     * @param array $grid
     */
    private function initGrid(array $grid): void
    {
        $this->grid = $grid;
        $this->extendsOnBottom();
        $this->extendsOnRight();
    }

    private function extendsOnBottom(): void
    {
        $this->grid[$this->height] = [];
        $index = 0;
        while ($index < $this->width) {
            array_push($this->grid[$this->height], Node::EMPTY);
            $index++;
        }
    }

    private function extendsOnRight(): void
    {
        $index = 0;
        while ($index <= $this->height) {
            $this->grid[$index][$this->width] = Node::EMPTY;
            $index++;
        }
    }

    public function setResults(): void
    {
        $column = 0;
        while ($column < $this->width) {
            $line = 0;
            while ($line < $this->height) {
                if ($this->grid[$line][$column] !== Node::EMPTY) {
                    $node = new Node($line, $column, $this->grid[$line][$column]);
                    $rightArray = array_slice($this->grid[$line], $column + 1, null, true);
                    $bottomArray = array_slice($this->grid, $line + 1, null, true);
                    $node->setRightNode($rightArray);
                    $node->setBottomNode($bottomArray);
                    $result = $node . ' ' . $node->getRightNode() . ' ' . $node->getBottomNode();
                    echo $result . PHP_EOL;
                    array_push($this->results, $result);
                }
                $line++;
            }
            $column++;
        }
    }

    /**
     * @return array
     */
    public function getResults(): array
    {
        return $this->results;
    }
}

<?php


namespace CodinGame\Medium\ThereIsNoSpoon;

use JetBrains\PhpStorm\Pure;

/**
 * Class Node
 * @package CodinGame\Medium\ThereIsNoSpoon
 */
class Node
{
    /**
     * @var string
     */
    private const VALID = '0';
    /**
     * @var string
     */
    public const EMPTY = '.';
    /**
     * @var int
     */
    private const EMPTY_POSITION = -1;
    /**
     * @var int
     */
    private int $positionX;
    /**
     * @var int
     */
    private int $positionY;
    /**
     * @var Node|null
     */
    private ?Node $rightNode;
    /**
     * @var Node|null
     */
    private ?Node $bottomNode;

    /**
     * Node constructor.
     * @param int $positionX
     * @param int $positionY
     * @param string $value
     */
    #[Pure] public function __construct(int $positionX, int $positionY, string $value)
    {
        $this->positionX =  ($value === self::EMPTY) ? self::EMPTY_POSITION : $positionX;
        $this->positionY =  ($value === self::EMPTY) ? self::EMPTY_POSITION : $positionY;
        $this->rightNode = null;
        $this->bottomNode = null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->positionY . ' ' . $this->positionX;
    }

    /**
     * @return Node|null
     */
    public function getRightNode(): ?Node
    {
        return $this->rightNode;
    }

    /**
     * @param array $columns
     */
    public function setRightNode(array $columns): void
    {
        foreach ($columns as $key => $value) {
            if ($value === self::VALID) {
                $this->rightNode = new Node($this->positionX, $key, self::VALID);
                break;
            }
        }

        if (is_null($this->rightNode)) {
            $this->rightNode = new Node($this->positionX, $this->positionY, self::EMPTY);
        }
    }

    /**
     * @return Node|null
     */
    public function getBottomNode(): ?Node
    {
        return $this->bottomNode;
    }

    /**
     * @param array $lines
     */
    public function setBottomNode(array $lines): void
    {
        foreach ($lines as $key => $line) {
            $value = $line[$this->positionY];
            if ($value === self::VALID) {
                $this->bottomNode = new Node($key, $this->positionY, self::VALID);
                break;
            }
        }

        if ((is_null($this->bottomNode))) {
            $this->bottomNode = new Node($this->positionX, $this->positionY, self::EMPTY);
        }
    }
}

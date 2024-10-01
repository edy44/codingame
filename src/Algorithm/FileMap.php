<?php

declare(strict_types=1);

namespace CodinGame\Algorithm;

use Exception;

abstract class FileMap extends Map
{
    private const START_CHARACTER = "0";

    private const END_CHARACTER = "1";

    private const WALL_CHARACTER = "#";

    private const END_LINE = "\n";

    private static ?string $fileContent = null;

    /**
     * @throws Exception
     */
    final public static function initFromFile(string $filePath): Map
    {
        self::getFileContent($filePath);
        return self::init();
    }

    /**
     * @throws Exception
     */
    final protected static function init(): Map
    {
        $grid = [];
        $startPosition = null;
        $endPosition = null;
        $index = 0;
        $line = 0;
        $column = 0;
        $height = 0;
        $width = 0;

        while ($index < strlen(self::$fileContent)) {
            $character = self::$fileContent[$index];
            $position = Position::init(x: $line, y: $column);
            $isTraversable = true;

            switch ($character) {
                case self::START_CHARACTER:
                    $startPosition = $position;
                    break;
                case self::END_CHARACTER:
                    $endPosition = $position;
                    break;
                case self::WALL_CHARACTER:
                    $isTraversable = false;
            }

            if ($character === self::END_LINE) {
                $height = $line;
                ++$line;
                $width = $column;
                $column = 0;
            } else {
                $grid[] = static::initDefaultNode(position: $position, isTraversable: $isTraversable);
                ++$column;
            }

            ++$index;
        }

        self::checkIsValid(grid: $grid, startPosition: $startPosition, endPosition: $endPosition);

        return static::createMap(
            height: $height,
            width: $width,
            grid: $grid,
            startPosition: $startPosition,
            endPosition: $endPosition
        );
    }

    /**
     * @inheritDoc
     */
    final public function print(array $path): void
    {
        $content = self::$fileContent;
        foreach ($path as $position) {
            $indexCurrentPosition = (($this->getWidth() + 1) * $position->getX()) + $position->getY();
            $content[$indexCurrentPosition] = ".";
            echo "$content\n";
            sleep(1);
        }
    }

    /**
     * @throws Exception
     */
    private static function getFileContent(string $filePath): void
    {
        if (!file_exists($filePath)) {
            throw new Exception($filePath . ' does not exist');
        }

        if(!(self::$fileContent = file_get_contents($filePath))) {
            throw new Exception('Failed to get content from file ' . $filePath);
        }
    }
}

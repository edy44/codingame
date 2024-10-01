<?php

declare(strict_types=1);

namespace CodinGame\Algorithm;

final class AuthorizedMoves
{
    /**
     * @return array<array-key, Position>
     */
    public static function unidirectionalMoves(): array
    {
        $authorizedMoves = [];
        $authorizedMoves[] = self::leftMove();
        $authorizedMoves[] = self::highMove();
        $authorizedMoves[] = self::rightMove();
        $authorizedMoves[] = self::bottomMove();

        return $authorizedMoves;
    }

    private static function leftMove(): Position
    {
        return Position::init(0, -1);
    }

    private static function highMove(): Position
    {
        return Position::init(-1, 0);
    }

    private static function rightMove(): Position
    {
        return Position::init(1, 0);
    }

    private static function bottomMove(): Position
    {
        return Position::init(0, 1);
    }
}

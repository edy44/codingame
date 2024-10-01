<?php

define("PROJECT_DIR", dirname(__DIR__, 5));
require PROJECT_DIR . "/vendor/autoload.php";

use CodinGame\Algorithm\AStar\AStarAlgorithm;
use CodinGame\Algorithm\AStar\AStarFileMap;
use CodinGame\Algorithm\AuthorizedMoves;

$rootDir = __DIR__ . '/Maps/';
try {
    $map = AStarFileMap::initFromFile(filePath: $rootDir . $argv[1]);
    $authorizedMoves = AuthorizedMoves::unidirectionalMoves();
    $AStar = new AStarAlgorithm(map: $map, authorizedMoves: $authorizedMoves);
    $AStar->execute();
    $AStar->print();
} catch (Exception $exception) {
    echo $exception->getMessage();
    echo 1;
}

echo 0;

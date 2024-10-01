<?php

define("PROJECT_DIR", dirname(__DIR__, 5));
require PROJECT_DIR . "/vendor/autoload.php";

use CodinGame\Algorithm\AuthorizedMoves;
use CodinGame\Algorithm\Dijkstra\DijkstraAlgorithm;
use CodinGame\Algorithm\Dijkstra\DijkstraFileMap;

$rootDir = __DIR__ . '/Maps/';
try {
    $map = DijkstraFileMap::initFromFile(filePath: $rootDir . $argv[1]);
    $authorizedMoves = AuthorizedMoves::unidirectionalMoves();
    $dijkstra = new DijkstraAlgorithm();
    $dijkstra->execute(map: $map, authorizedMoves: $authorizedMoves);
    $dijkstra->print();
} catch (Exception $exception) {
    echo $exception->getMessage();
    echo 1;
}

echo 0;

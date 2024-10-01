Feature: Dijkstra Algorithm

  Scenario: Short path without wall
    Given A file path "l11" which contains the map
    When I execute the AStar Algorithm
    Then The short path contains "9" moves
    And Execution time is lower than "0.1" seconds

  Scenario: Short path with walls
    Given A file path "l12" which contains the map
    When I execute the AStar Algorithm
    Then The short path contains "15" moves
    And Execution time is lower than "0.1" seconds

  Scenario: Short path with walls
    Given A file path "l13" which contains the map
    When I execute the AStar Algorithm
    Then The short path contains "13" moves
    And Execution time is lower than "0.1" seconds

  Scenario: Short path big map
    Given A file path "l14" which contains the map
    When I execute the AStar Algorithm
    Then The short path contains "24" moves
    And Execution time is lower than "1.0" seconds

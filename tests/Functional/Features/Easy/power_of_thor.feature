Feature: Find right path for Thor

  Scenario: Simple line
    Given Thor at initial position X "5" and Y "4", and the lightning at ending position X "31" and Y "4"
    When Thor moves with 26 turns remaining
    Then Thor moves to direction "E"

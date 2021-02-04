Feature: Conway

  Scenario: R = 1 et L = 11
    Given A start number "1"
    When I execute the Conway's Suite until the line "11"
    Then I return the following line "1 1 1 3 1 2 2 1 1 3 3 1 1 2 1 3 2 1 1 3 2 1 2 2 2 1"

  Scenario: R = 2 et L = 1
    Given A start number "2"
    When I execute the Conway's Suite until the line "1"
    Then I return the following line "2"

  Scenario: R = 5 et L = 10
    Given A start number "5"
    When I execute the Conway's Suite until the line "10"
    Then I return the following line "3 1 1 3 1 1 2 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 2 1 1 5"

  Scenario: R = 25 et L = 10
    Given A start number "25"
    When I execute the Conway's Suite until the line "10"
    Then I return the following line "3 1 1 3 1 1 2 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 2 1 1 25"

  Scenario: R = 1 et L = 25
    Given A start number "1"
    When I execute the Conway's Suite until the line "25"
    Then I return the following line "1 3 2 1 1 3 2 1 3 2 2 1 1 3 3 1 1 2 1 3 2 1 2 3 1 2 3 1 1 2 1 1 1 3 1 1 2 2 2 1 1 2 1 3 2 1 1 3 3 1 1 2 1 3 2 1 1 2 3 1 2 3 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 2 1 1 2 1 3 2 1 1 3 2 1 2 2 3 1 1 2 1 1 1 3 1 1 2 2 2 1 1 2 1 3 2 1 1 3 2 1 3 2 2 1 1 2 3 1 2 3 2 1 1 2 3 1 1 3 2 1 3 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 1 3 2 2 1 1 1 2 1 3 1 2 2 1 1 2 3 1 1 3 1 1 1 2 3 1 1 2 1 1 2 3 2 2 2 1 1 2 1 3 2 1 1 3 2 1 3 2 2 1 1 3 3 1 1 2 1 3 2 1 2 3 1 2 3 1 1 2 1 1 1 3 1 2 1 1 1 3 1 2 2 1 2 2 3 1 1 3 1 1 2 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 1 3 2 2 1 1 1 2 1 3 1 2 2 1 1 2 3 1 1 3 1 1 1 2 3 1 1 2 1 1 2 3 2 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 1 3 2 2 2 1 2 3 2 1 1 2 1 1 1 3 1 2 1 1 1 2 1 3 1 1 1 2 1 3 2 1 1 2 3 1 1 3 2 1 3 2 2 1 1 2 1 1 1 3 1 2 2 1 2 3 2 1 1 2 1 1 1 3 1 2 2 1 2 2 2 1 1 2 1 1 2 3 2 2 2 1 1 2 1 3 2 1 1 3 2 1 3 2 2 1 1 3 3 1 1 2 1 3 2 1 2 3 1 2 3 1 1 2 1 1 1 3 1 1 2 2 2 1 1 2 1 3 2 1 1 3 2 1 3 2 2 1 1 3 2 2 1 3 2 1 1 3 2 1 3 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 3 3 1 1 2 1 3 2 1 2 3 2 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 2 2 1 3 2 1 1 2 3 1 1 3 2 1 3 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 3 2 2 1 1 3 3 2 1 1 3 2 2 1 1 2 2 1 1 2 1 3 3 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 1 1 1 2 1 3 1 2 2 1 1 2 3 1 1 3 1 1 1 2 3 1 1 2 1 1 1 3 3 1 1 2 1 1 1 3 1 2 2 1 1 2 1 3 2 1 1 3 1 2 1 1 1 3 2 2 2 1 1 2 3 1 1 3 1 1 2 2 1 1 1 2 1 3 1 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 2 1 1 1 3 3 1 1 2 1 1 1 3 1 1 2 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 1 3 2 2 2 1 1 2 1 3 2 1 1 3 2 1 3 2 2 1 2 3 2 1 1 2 1 1 1 3 1 2 1 1 1 2 1 3 3 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 3 1 1 1 2 2 1 2 2 1 1 1 3 1 2 2 1 1 2 1 3 2 1 1 3 1 2 1 1 1 3 2 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 2 1 1 2 1 1 1 3 3 1 1 2 1 1 1 3 1 1 2 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 1 3 2 2 2 1 2 3 2 1 1 2 1 1 1 3 1 2 1 1 1 2 1 3 3 2 2 1 1 2 1 3 2 1 1 3 2 1 3 2 2 1 1 3 3 1 1 2 1 3 2 1 2 3 1 2 3 1 1 2 1 1 1 3 1 1 2 2 2 1 1 2 1 3 2 1 1 3 2 1 2 2 3 1 1 2 1 1 1 3 1 1 2 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 3 2 2 1 1 3 3 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 2 2 1 3 2 1 1 3 2 1 3 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 3 1 1 1 2 3 1 1 3 1 1 1 2 1 3 2 1 1 2 2 1 1 2 1 3 2 2 3 1 1 2 1 1 1 3 1 2 2 1 1 3 3 2 2 1 1 3 1 1 1 2 2 1 1 3 1 2 2 1"

  Scenario: R = 33 et L = 25
    Given A start number "33"
    When I execute the Conway's Suite until the line "25"
    Then I return the following line "3 1 1 3 1 1 2 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 1 1 1 2 1 3 1 2 2 1 1 2 3 1 1 3 1 1 1 2 3 1 1 2 1 1 1 3 3 1 1 2 1 1 1 3 1 2 2 1 1 2 1 3 2 1 1 3 1 2 1 1 1 3 2 2 2 1 1 2 3 1 1 3 1 1 2 2 1 1 1 2 1 3 1 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 2 1 1 1 3 3 1 1 2 1 1 1 3 1 1 2 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 1 3 2 2 2 1 1 2 1 3 2 1 1 3 2 1 3 2 2 1 2 3 2 1 1 2 1 1 1 3 1 2 1 1 1 2 1 3 3 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 3 1 1 1 2 2 1 2 2 1 1 1 3 1 2 2 1 1 2 1 3 2 1 1 3 1 2 1 1 1 3 2 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 2 1 1 2 1 1 1 3 3 1 1 2 1 1 1 3 1 1 2 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 1 3 2 2 2 1 2 3 2 1 1 2 1 1 1 3 1 2 1 1 1 2 1 3 3 2 2 1 1 2 1 3 2 1 1 3 2 1 3 2 2 1 1 3 3 1 1 2 1 3 2 1 1 3 2 2 1 3 2 1 1 2 3 1 1 3 2 1 3 2 2 1 1 2 1 1 1 3 1 2 2 1 2 3 2 1 1 2 1 1 1 3 1 2 2 1 2 2 2 1 1 2 1 1 2 3 2 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 1 1 1 2 1 3 2 1 3 2 1 1 2 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 1 3 2 2 2 1 1 2 1 3 2 1 1 3 2 1 3 2 2 1 2 3 2 1 1 2 1 1 1 3 1 2 1 1 1 2 1 3 3 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 1 1 1 2 1 3 1 2 2 1 1 2 3 1 1 3 1 1 1 2 3 1 1 2 1 1 2 3 2 2 2 1 1 2 1 1 1 3 3 1 1 2 1 1 1 3 1 1 2 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 1 3 2 2 1 1 1 2 1 3 1 2 2 1 1 2 3 1 1 3 1 1 1 2 3 1 1 2 1 1 2 3 2 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 1 3 2 2 2 1 2 3 2 1 1 2 1 1 1 3 1 2 1 1 1 2 1 3 1 1 1 2 1 3 2 1 1 2 3 1 1 3 2 1 3 2 2 1 1 2 1 1 1 3 1 2 2 1 2 3 2 1 1 2 1 1 1 3 1 2 2 1 2 2 2 1 1 2 1 1 2 3 2 2 2 1 1 2 1 3 2 1 1 3 2 1 3 2 2 1 1 3 3 1 1 2 1 3 2 1 2 3 1 2 3 1 1 2 1 1 1 3 1 1 2 2 2 1 1 2 1 3 2 1 1 3 2 1 3 2 2 1 1 3 2 2 1 3 2 1 1 3 2 1 3 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 3 3 1 1 2 1 3 2 1 2 3 2 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 2 2 1 3 2 1 1 2 3 1 1 3 2 1 3 2 2 1 1 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 3 2 2 1 1 3 3 2 1 1 3 2 2 1 1 2 2 1 1 2 1 3 3 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 1 1 1 2 1 3 1 2 2 1 1 2 3 1 1 3 1 1 1 2 3 1 1 2 1 1 1 3 3 1 1 2 1 1 1 3 1 2 2 1 1 2 1 3 2 1 1 3 3 1 1 2 1 3 2 1 1 3 2 1 2 2 2 1 2 2 1 1 1 3 1 2 2 1 1 3 1 2 1 1 1 3 2 2 2 1 2 3 2 1 1 2 1 1 1 3 1 2 1 1 1 2 1 3 3 2 2 1 1 2 1 3 2 1 1 3 2 1 3 2 2 1 1 3 3 1 1 2 1 3 2 1 1 3 2 2 1 3 2 1 1 2 3 1 1 3 2 1 3 2 2 1 1 2 1 1 1 3 1 2 2 1 2 3 2 1 1 2 1 1 1 3 1 2 2 1 2 2 2 1 1 2 1 1 2 3 2 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 1 3 1 1 1 2 3 1 1 3 3 2 1 1 1 2 1 3 1 2 2 1 1 2 3 1 1 3 1 1 1 2 3 1 1 2 1 1 1 3 3 1 1 2 1 1 1 3 1 2 2 1 1 2 1 3 2 1 1 3 2 1 3 2 2 1 1 3 2 2 1 1 1 3 1 2 2 1 1 2 1 3 1 1 1 2 1 3 1 2 2 1 1 2 1 3 2 1 1 3 2 1 3 2 2 1 1 2 3 1 1 3 1 1 2 2 2 1 2 3 2 1 1 2 1 1 1 3 1 2 2 1 1 3 2 2 1 1 1 3 1 2 2 1 1 2 1 3 2 1 1 3 1 1 1 2 3 1 1 3 2 2 3 1 1 2 1 1 1 3 2 1 3 2 2 1 2 3 1 2 2 1 1 3 2 2 2 1 2 2 2 1 1 2 1 1 2 3 2 2 2 1 1 33"

Feature: Stock Exchange Losses

  Scenario: Exemple 1
    Given Stock exchange values "3 2 4 2 1 5"
    When I find the maximal loss
    Then I return the following value "-3"

  Scenario: Exemple 2
    Given Stock exchange values "5 3 4 2 3 1"
    When I find the maximal loss
    Then I return the following value "-4"

  Scenario: Exemple 3
    Given Stock exchange values "1 2 4 4 5"
    When I find the maximal loss
    Then I return the following value "0"

  Scenario: Exemple 4
    Given Stock exchange values "3 4 7 9 10"
    When I find the maximal loss
    Then I return the following value "0"

  Scenario: Exemple 6
    Given Stock exchange values "3 2 10 7 15 14"
    When I find the maximal loss
    Then I return the following value "-3"

  Scenario: Exemple Bonus
    Given Stock exchange values "10 6 8 4 6 2"
    When I find the maximal loss
    Then I return the following value "-8"

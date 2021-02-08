Feature: There Is No Spoon

  Scenario: Exemple
    Given A Grid with a width "2" and a length "2" with the following values "0,0;0,."
    When I find the node positions
    Then I return the following string "0 0 1 0 0 1,0 1 -1 -1 -1 -1,1 0 -1 -1 -1 -1"

  Scenario: Exemple 2
    Given A Grid with a width "5" and a length "1" with the following values "0,.,0,.,0"
    When I find the node positions
    Then I return the following string "0 0 2 0 -1 -1,2 0 4 0 -1 -1,4 0 -1 -1 -1 -1"

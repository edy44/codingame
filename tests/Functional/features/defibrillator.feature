Feature: Find the closest Defibrillator

  Scenario: Example
    Given the Defibrillator's list "1;Maison de la Prevention Sante;6 rue Maguelone 340000 Montpellier;;3,87952263361082;43,6071285339217%2;Hotel de Ville;1 place Georges Freche 34267 Montpellier;;3,89652239197876;43,5987299452849%3;Zoo de Lunaret;50 avenue Agropolis 34090 Mtp;;3,87388031141133;43,6395872778854"
    When searching the closest Defibrillator near a longitude "3,879483" and a latitude "43,608177"
    Then get the following name "Maison de la Prevention Sante"

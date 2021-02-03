Feature: Scrabble

  Scenario: Only one word
    Given A dictionnary of words "because,first,these,could,which"
    When I find the best combination of letters "hicquwh"
    Then I return the following word "which"

  Scenario: 2 words with the same value
    Given A dictionnary of words "some,first,potsie,day,could,postie,from,have,back,this"
    When I find the best combination of letters "sopitez"
    Then I return the following word "potsie"

  Scenario: 2 words with the different values
    Given A dictionnary of words "after,repots,user,powers,these,time,know,from,could,people"
    When I find the best combination of letters "tsropwe"
    Then I return the following word "powers"

  Scenario: Many possibilities
    Given A dictionnary of words "arrest,rarest,raster,raters,sartre,starer,waster,waters,wrest,wrase"
    When I find the best combination of letters "arwtsre"
    Then I return the following word "waster"

  Scenario: Value better than size
    Given A dictionnary of words "entire,tween,soft,would,test"
    When I find the best combination of letters "etiewrn"
    Then I return the following word "tween"

  Scenario: Cannot use letter twice
    Given A dictionnary of words "after,repots,poowers,powers,these,time,know,from,could,people"
    When I find the best combination of letters "tsropwe"
    Then I return the following word "powers"

  Scenario: Valid word
    Given A dictionnary of words "qzyoq,azejuy,kqjsdh,aeiou,qsjkdh"
    When I find the best combination of letters "qzaeiou"
    Then I return the following word "aeiou"

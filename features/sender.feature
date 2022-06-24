Feature: Send parcel
  In order to buy products
  As a customer
  I need to be able to put interesting products into a basket

  Rules:
  - At least one courier is avalible

  Scenario: send a parcel
    Given I am a normaluser
    And there is a courier with name "fedex"
    When I browse to the homepage
    Then I should see a courier named "fedex"
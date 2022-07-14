Feature: Send parcel
  In order to send parcel
  As a sender
  I need to be able to submit a form to send parcel

  Rules:
  - At least one courier is avalible

  Scenario: must have courier to choose
    Given I am a normaluser
    And there is a courier with name "fedex"
    When I browse to the homepage
    Then I should see a courier named "fedex"

  Scenario: able to send a parcel
    Given I am a normaluser
    And I submit the form with all the detail
    When I browse to the homepage
    Then I should see a parcel with detail I wrote

  Scenario: able to track tracking number
    Given I am courier
    And I want to track parcel with all detail
    When I browse to the homepage
    Then I should see a tracking page

  Scenario: able to update parcel
    Given I am courier
    And I want to update parcel from not pickup to not dispatched
    When I browse the homepage
    Then I should see a form to submit
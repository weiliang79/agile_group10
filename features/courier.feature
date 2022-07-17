Feature: Update parcel status
  In order to update parcel status
  As a courier
  I need to be able to enter tracking number to update parcel status

  Rules:
  - At least one parcel is availble

  Scenario: able to update parcel status
    Given I am a courier
    And I submit the tracking number
    When I browse to the tracking page
    Then I should see a parcel with updated status

  Scenario: able to accept parcel request
    Given I am a courier
    And I accept the parcel request
    Then database should record parcel request accpeted

  Scenario: able to track tracking number
    Given I am a courier
    And I want to track parcel with all detail
    When I browse to the homepage
    Then I should see a tracking page

  Scenario: able to update parcel
    Given I am a courier
    And I want to update parcel from not pickup to not dispatched
    When I browse the homepage
    Then I should see a form to submit
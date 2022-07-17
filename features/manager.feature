Feature: Submit new parcel request
  In order to submit new parcel request
  As a manager
  I need to be able to check the status of the parcel

  Rules:
  - At least one manager is availble

  Scenario: must have manager to check the status
    Given I am a manager
    And there is a parcel status show delivered
    When I browse to the page
    Then I should see a parcel status show delivered

  Scenario: must have manager to assign the task for courier
    Given I am a manager
    And there is a parcel does not have any courier is responsible
    When I browse to the page
    Then I can assign the task to the courier
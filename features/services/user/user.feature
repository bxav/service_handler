@user
Feature:
    In order to sub sell domain names
    As a soap api user
    I need to check the domain availability, and to register one

    Scenario: check domain availability
        Given I create the customer "bob"
        Then I should have the customer "bob"

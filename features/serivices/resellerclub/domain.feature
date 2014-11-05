@resellerclub
Feature:
    In order to sub sell domain names
    As a developer
    I need to check the domain availability, and to register one

    Background:
        Given I have a reseller club account
        Given I have a customer "bob"
    
    Scenario: check domain availability
        When I check availability for "tralalaipouet" on "email"
        Then I should get available
    
    Scenario: Register domain
        When I register "tralala" on "email"
        Then I should get register
        
@domain
Feature:
    In order to sub sell domain names
    As a soap api user
    I need to check the domain availability, and to register one

    Background:
        Given I create the customer "jeanbob"
        
        
    Scenario: check domain availability
        When I check availability for "tralalaipouet" on "email"
        Then I should get available
    
    Scenario: Register domain
        When I register "tralala" on "email" for "jeanbob"
        Then I should get register

Feature:
    In order to manage my application
    As an administrator
    I need to have acces to the admin page

    Scenario:
        Given I am on the "login" page
        Given I fill my login "admin" and my password "admin"
         When I am on the "admin" page
         Then I should see "sonata project"
<?php
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {}

    /**
     * @Given I am on the :arg1 page
     */
    public function iAmOnThePage($aliasPage)
    {
        $urlPages = [
            'admin' => '/admin',
            'login' => '/login'
        ];
        $this->visit($urlPages[$aliasPage]);
    }

    /**
     * @Given I fill my login :arg1 and my password :arg2
     */
    public function iFillMyLoginAndMyPassword($username, $password)
    {
        return [
            $this->fillField("_username", $username),
            $this->fillField("_password", $password),
            $this->pressButton("Login")
        ];
    }
}

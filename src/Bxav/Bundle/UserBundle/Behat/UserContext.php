<?php
namespace Bxav\Bundle\UserBundle\Behat;

use Bxav\Bundle\CommonSoapBundle\Behat\SoapContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Faker\Factory as FakerFactory;

/**
 * Defines application features from the specific context.
 */
class UserContext extends SoapContext implements SnippetAcceptingContext
{

    protected $client = null;
    
    private $faker;
    
    public function __construct()
    {
        $this->faker = FakerFactory::create();
    }

    protected function getServiceProviderName() {
        return 'bxav_user.service_provider';
    }

    /**
     * @Given I have a customer :username
     */
    public function iHaveACustomer($username)
    {
        var_dump($this->getSoapClient()->__getFunctions());
        var_dump(@$this->getSoapClient()->createCustomer("dddd"));
    }
    
    /**
     * @Given I create the customer :name
     */
    public function iCreateTheCustomer($name)
    {
        $this->getSoapClient()->createCustomer($this->faker->safeEmail, $name, $this->faker->firstname, $this->faker->lastname);
    }
    
    /**
     * @Then I should have the customer :name
     */
    public function iShouldHaveTheCustomer($name)
    {
        //$this->getDomainSoapClient()->createCustomer($name);
    }
}

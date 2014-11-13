<?php
namespace Bxav\Bundle\DomainBundle\Behat;

use Bxav\Bundle\CommonSoapBundle\Behat\SoapContext;
use Behat\Behat\Context\SnippetAcceptingContext;

/**
 * Defines application features from the specific context.
 */
class DomainContext extends SoapContext implements SnippetAcceptingContext
{

    
    /**
     * @Given I have a customer :username
     */
    public function iHaveACustomer($username)
    {
        throw new PendingException();
    }
    
    /**
     * @When I check availability for :domain on :tld
     */
    public function iCheckAvailabilityForOn($domain, $tld)
    {
        throw new PendingException();
    }
    
    /**
     * @Then I should get available
     */
    public function iShouldGetAvailable()
    {
        throw new PendingException();
    }
    
    /**
     * @When I register :domain on :tld
     */
    public function iRegisterOn($domain, $tld)
    {
        throw new PendingException();
    }
    
    /**
     * @Then I should get register
     */
    public function iShouldGetRegister()
    {
        throw new PendingException();
    }
    
}

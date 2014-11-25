<?php
namespace Bxav\Bundle\DomainBundle\Behat;

use Bxav\Bundle\CommonSoapBundle\Behat\SoapContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Bxav\Bundle\UserBundle\Entity\Customer;

/**
 * Defines application features from the specific context.
 */
class DomainContext extends SoapContext implements SnippetAcceptingContext
{

    protected $lastResponse;

    protected function getServiceProviderName()
    {
        return 'bxav_domain.service_provider';
    }

    /**
     * @When I check availability for :domain on :tld
     */
    public function iCheckAvailabilityForOn($domain, $tld)
    {
        $this->lastResponse = $this->getSoapClient()->isDomainAvailable($domain, $tld);
    }

    /**
     * @Then I should get available
     */
    public function iShouldGetAvailable()
    {
        if (! $this->lastResponse) {
            throw new \Exception("domain not available");
        }
    }

    /**
     * @When I register :domain on :tld for :customerUsername
     */
    public function iRegisterOn($domain, $tld)
    {
        $customer = $this->findOneCustomerByUser('admin');
        $this->lastResponse = $this->getSoapClient()->registerDomain($domain, $tld, $customer->getId());
    }

    /**
     * @Then I should get register
     */
    public function iShouldGetRegister()
    {
        if (! $this->lastResponse) {
            throw new \Exception("domain not register");
        }
    }
    
    /**
     * 
     * @param string $username
     * @return Customer
     */
    private function findOneCustomerByUser($username)
    {
        $user = $this->getService('doctrine.orm.entity_manager')->getRepository('BxavUserBundle:User')->findByUsername($username);
        $customer = $this->getService('doctrine.orm.entity_manager')->getRepository('BxavUserBundle:Customer')->findOneByUser($user);
        return $customer;
    }
    
}

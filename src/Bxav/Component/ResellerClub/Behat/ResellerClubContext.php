<?php
namespace Bxav\Component\ResellerClub\Behat;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\MinkExtension\Context\RawMinkContext;
use GuzzleHttp\Client;
use Bxav\Component\ResellerClub\Model\ResellerClubClient;
use Bxav\Component\ResellerClub\Model\DomainRegister;
use Bxav\Component\ResellerClub\Model\CustomerManager;
use Bxav\Component\ResellerClub\Model\Customer;
use Bxav\Component\ResellerClub\Model\Address;
use Bxav\Component\ResellerClub\Model\Phone;


class ResellerClubContext extends RawMinkContext implements SnippetAcceptingContext
{
    
    protected $resellerClubClient;
    
    protected $customer;
    
    protected $response;
    
    protected $askedDomain;
    
    protected $apiBase = [];

    protected $domainResgisterOption = [];
    
    public function __construct($apiUrl, $userId, $apiKey, $nameservers)
    {
        $this->apiBase = [
            'apiUrl' => $apiUrl,
            'userId' => $userId,
            'apiKey' => $apiKey    
        ];
        $this->domainResgisterOption['ns'] = $nameservers;
    }    
    
    /**
     * @Given I have a reseller club account
     */
    public function iHaveAResellerClubAccount()
    {
        $client = new Client();

        $this->resellerClubClient = new ResellerClubClient(
            $client, 
            $this->apiBase['apiUrl'], 
            $this->apiBase['userId'], 
            $this->apiBase['apiKey']
        );
    }
    
    /**
     * @When I check availability for :domain on :tld
     */
    public function iCheckAvailabilityForOn($domain, $tld)
    {
        $domainRegister = new DomainRegister($this->resellerClubClient);
        $this->domainRegisterLastResponce = $domainRegister->isDomainAvailable($domain, $tld);
    }

    /**
     * @Then I should get available
     */
    public function iShouldGetAvailable()
    {
        if (!$this->domainRegisterLastResponce) {
            throw new \Exception("Non available");
        }
    }    
    
    /**
     * @When I register :domain on :tld
     */
    public function iRegisterOn($domain, $tld)
    {
        $domainRegister = new DomainRegister($this->resellerClubClient, $this->domainResgisterOption['ns']);
        $this->domainRegisterLastResponce = $domainRegister->register($domain . '-' . uniqid(), $tld, $this->customer);
    }
    
    /**
     * @Then I should get register
     */
    public function iShouldGetRegister()
    {
        if (!$this->domainRegisterLastResponce) {
            throw new \Exception("Not registered");
        }
    }
    
    /**
     * @Given I have a customer :name
     */
    public function iHaveACustomer($name)
    {
        $customer = new Customer($name . '_' . uniqid() . '@example.com');
        $customer->setName($name)
            ->setPasswd('passpass666')
            ->setCompany('company')
            ->setAddress(new Address('addressLine1', 'city', 'state', 'US', '000000'))
            ->setPhone(new Phone('33', '0666666666'))
            ->setLang('en');
        
        $customerManager = new CustomerManager($this->resellerClubClient);
        $this->customer = $customerManager->register($customer);
    }
    
}

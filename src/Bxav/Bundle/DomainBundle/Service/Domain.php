<?php
namespace Bxav\Bundle\DomainBundle\Service;

use Bxav\Component\ResellerClub\Model\DomainRegister;
use Bxav\Component\ResellerClub\Model\CustomerManager as ResellerClubManager;

class Domain
{

    protected $domainRegister;
    
    protected $manager;
    
    protected $customerRepository;
    
    public function __construct(DomainRegister $domainRegister, ResellerClubManager $manager, $customerRepository)
    {
        $this->domainRegister = $domainRegister;
        $this->manager = $manager;
        $this->customerRepository = customerRepository;
    }

    /**
     *
     * @param string $domain            
     * @param string $tld            
     * @return boolean
     */
    public function isDomainAvailable($domain, $tld)
    {
        return $this->domainRegister->isDomainAvailable($domain, $tld);;
    }

    /**
     *
     * @param string $domain            
     * @param string $tld            
     * @param integer $idCustomer            
     * @return boolean
     */
    public function registerDomain($domain, $tld, $idCustomer)
    {
        $customer = $this->customerRepository->getById($idCustomer);
        $registered = $this->domainRegister->register($domain, $tld, $customer->getNewResellerClubCustomer());
        return $registered;
    }
}

<?php
namespace Bxav\Bundle\DomainBundle\Service;

use Bxav\Component\ResellerClub\Model\DomainRegister;
use Bxav\Component\ResellerClub\Model\CustomerManager as ResellerClubManager;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Bxav\Bundle\UserBundle\Entity\CustomerRepository;

class DomainService
{

    protected $domainRegister;
    
    protected $manager;
    
    protected $customerRepository;
    
    protected $token;
    
    public function __construct(
        DomainRegister $domainRegister,
        ResellerClubManager $manager,
        CustomerRepository $customerRepository,
        TokenInterface $token = null
    ) {
        $this->token = $token;
        $this->domainRegister = $domainRegister;
        $this->manager = $manager;
        $this->customerRepository = $customerRepository;
    }

    /**
     *
     * @param string $domain            
     * @param string $tld            
     * @return boolean
     */
    public function isDomainAvailable($domain, $tld)
    {
        return $this->domainRegister->isDomainAvailable($domain, $tld);
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
        $customer = $this->customerRepository->setCurrentUser($this->getCurrentUser())
                                             ->findByCurrentUserAndId((int)$idCustomer);

        return $customer;
    }
    
    private function getCurrentUser()
    {
        return $this->token->getUser();
    }
}

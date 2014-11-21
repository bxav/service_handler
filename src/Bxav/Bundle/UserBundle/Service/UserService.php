<?php
namespace Bxav\Bundle\UserBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use Bxav\Bundle\UserBundle\Entity\User;
use Bxav\Bundle\UserBundle\Entity\Customer;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Bxav\Component\ResellerClub\Model\Phone;

class UserService
{

    protected $em;

    protected $token;
    
    public function __construct(EntityManagerInterface $em, TokenInterface $token = null)
    {
        $this->em = $em;
        $this->token = $token;
    }
    
    private function getCurrentUser()
    {
        return $this->token->getUser();
    }
    
    private function getUserRepository()
    {
        return $this->em->getRepository('BxavUserBundle:User');
    }


    /**
     * 
     * @param string $email
     * @param string $username
     * @param string $firstname
     * @param string $lastname
     * @return Bxav\Bundle\UserBundle\Service\CustomerStruct
     */
    public function createCustomer($email, $username, $firstname, $lastname)
    {
        $customer = new Customer();
        $customer->setEmail($email);
        $customer->setUsername($username);
        $customer->setFirstname($firstname);
        $customer->setLastname($lastname);
        $customer->setUser($this->getCurrentUser());
        $this->getCurrentUser()->addCustomer($customer);
        $this->em->persist($customer);
        $this->em->persist($this->getCurrentUser());
        $this->em->flush();
        
        $return = new CustomerStruct($customer);
        
        return $return;
        
    }
    
    
}


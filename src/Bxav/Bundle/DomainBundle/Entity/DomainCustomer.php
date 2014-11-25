<?php
namespace Bxav\Bundle\DomainBundle\Entity;

use Bxav\Bundle\UserBundle\Entity\Customer;
use Bxav\Component\ResellerClub\Model\Address;
use Bxav\Component\ResellerClub\Model\Phone;

class DomainCustomer extends Customer
{

    
    protected $resellerClubId = null;

    public function createResellerClubCustomer()
    {
        $resellerCustomer = new \Bxav\Component\ResellerClub\Model\Customer($this->getUsername());
        $resellerCustomer->setName($this->firstname . ' ' . $this->lastname)
                         ->setPasswd(uniqid())
                         ->setCompany('company')
                         ->setAddress(new Address('addressLine1', 'city', 'state', 'US', '000000'))
                         ->setPhone(new Phone('33', '0666666666'))
                         ->setLang('en');
        return $resellerCustomer;
    }

    public function setResellerClubId($resellerClubId)
    {
        $this->resellerClubId = $resellerClubId;
        return $this;
    }
 
    
}

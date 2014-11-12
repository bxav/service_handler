<?php
namespace Bxav\Bundle\DomainBundle\Model;

use Bxav\Component\ResellerClub\Model\Customer;

class Customer
{

    public function getNewResellerClubCustomer()
    {
        $customer = new Customer($this->getEmail());
        $customer->setName($this->getName())
            ->setCompany($this->getCompany())
            ->setLang('en');
        return $customer;
    }
}

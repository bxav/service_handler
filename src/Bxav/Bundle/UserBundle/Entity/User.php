<?php
namespace Bxav\Bundle\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;

class User extends BaseUser
{

    protected $id;

    protected $customers;
    
    public function __construct()
    {
        parent::__construct();
        $this->customers = new ArrayCollection();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function hasCustomers()
    {
        return ! $this->customers->isEmpty();
    }

    public function addCustomer(Customer $customer)
    {
        $this->customers[] = $customer;
    }

    public function hasCustomer(Customer $customer)
    {
        return $this->customers->contains($customer);
    }
}

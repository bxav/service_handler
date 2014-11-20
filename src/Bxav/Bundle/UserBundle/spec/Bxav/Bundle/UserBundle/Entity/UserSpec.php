<?php

namespace spec\Bxav\Bundle\UserBundle\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Bxav\Bundle\UserBundle\Entity\Customer;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Bundle\UserBundle\Entity\User');
    }
    
    function it_has_not_customers_by_default()
    {
        $this->shouldNotHaveCustomers();
    }
    
    function it_adds_customer(Customer $customer)
    {
        $this->addCustomer($customer);
        $this->shouldHaveCustomer($customer);
        $this->shouldHaveCustomers();
    }
}

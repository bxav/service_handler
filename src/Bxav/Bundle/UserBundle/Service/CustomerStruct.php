<?php
namespace Bxav\Bundle\UserBundle\Service;

use Bxav\Bundle\UserBundle\Entity\Customer;

class CustomerStruct
{

    public function __construct(Customer $customer)
    {
        $this->id = $customer->getId();
        $this->email = $customer->getEmail();
        $this->username = $customer->getUsername();
        $this->firstname = $customer->getFirstname();
        $this->lastname = $customer->getLastname();
        $this->company = $customer->getCompany();
        $this->phone = new PhoneStruct($customer->getPhone());
    }

    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $firstname;

    /**
     * @var string
     */
    public $lastname;

    /**
     * @var string
     */
    public $company;

    /**
     * @var Bxav\Bundle\UserBundle\Service\PhoneStruct
     */
    public $phone;
}

class PhoneStruct
{
    
    public function __construct($num)
    {
        $this->num = $num;
    }

    /**
     * @var string
     */
    public $num;
}
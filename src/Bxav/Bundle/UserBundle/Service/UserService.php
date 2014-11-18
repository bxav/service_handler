<?php
namespace Bxav\Bundle\UserBundle\Service;

class DemoService
{
    public $test = "coucou"; 

    /**
     * 
     * @param string $email
     * @param string $username
     * @param string $firstname
     * @param string $lastname
     * @return integer $userId
     */
    public function createUser($email, $username, $firstname, $lastname)
    {
        $valid = true;
        return $valid;
    }
    
    /**
     * 
     * @param string $userId
     * @param string $customerName
     * @param string $customerEmail
     */
    public function addCustomer($userId, $customerName, $customerEmail)
    {
        
    }
}

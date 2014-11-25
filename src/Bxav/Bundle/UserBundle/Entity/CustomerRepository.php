<?php
namespace Bxav\Bundle\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\User\UserInterface;

class CustomerRepository extends EntityRepository
{
    protected $currentUser = null;
    
    /**
     * 
     * @param int $id
     * @return Customer|NULL
     */
    public function findByCurrentUserAndId($id)
    {
        $customer = $this->getRepository()->findOneById($id);
        if ($customer && $customer->getUser() == $this->getCurrentUser()) {
            return $customer;
        } else {
            return null;
        }
    }

    public function getCurrentUser()
    {
        if (is_null($this->currentUser)) {
            throw new \Exception('Current user not set');
        }
        return $this->currentUser;
    }

    public function setCurrentUser(UserInterface $currentUser)
    {
        $this->currentUser = $currentUser;
        return $this;
    }
    
    protected function getRepository()
    {
        return $this->getEntityManager()->getRepository('BxavUserBundle:Customer');
    }
 
}

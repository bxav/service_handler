<?php
namespace Bxav\Bundle\DomainBundle\Entity;

use Bxav\Bundle\UserBundle\Entity\CustomerRepository as BaseCustomerRepository;

class CustomerRepository extends BaseCustomerRepository
{


    protected function getRepository()
    {
        return $this->getEntityManager()->getRepository('BxavDomainBundle:DomainCustomer');
    }
}

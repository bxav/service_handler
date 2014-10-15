<?php
namespace Bxav\Bundle\ServiceHandlerClientBundle\Entity;

use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapServiceFactory as SoapServiceFactoryBase;

class SoapServiceFactory extends SoapServiceFactoryBase
{
    /**
     * @param string $wsdl
     * @return SoapService
     */
    public function create($wsdl)
    {
        return new SoapService($wsdl);
    }
}
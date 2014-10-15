<?php
namespace Bxav\Bundle\ServiceHandlerClientBundle\Model;

class SoapServiceFactory
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
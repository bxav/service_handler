<?php
namespace Bxav\Bundle\ServiceHandlerBundle\Service;

use Bxav\Bundle\ServiceHandlerBundle\Model\ServiceProviderChain;

class SoapServiceManagerService
{

    protected $serviceChain;

    public function __construct(ServiceProviderChain $serviceChain)
    {
        $this->serviceChain = $serviceChain;
    }

    /**
     * get all services
     *
     * @return string $services
     */
    public function getSoapServices()
    {
        $ser = [];
        foreach ($this->serviceChain->getServiceProviders() as $serviceP) {
            $obj = new \stdClass();
            $obj->wsdl = $serviceP->getWsdlUrl();
            $obj->location = $serviceP->getUrlLocation();
            $ser[] = $obj;
        }
        
        return json_encode($ser);
    }
}

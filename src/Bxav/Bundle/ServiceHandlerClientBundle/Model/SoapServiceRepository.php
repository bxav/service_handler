<?php
namespace Bxav\Bundle\ServiceHandlerClientBundle\Model;

class SoapServiceRepository
{

    protected $wsdl;
    
    protected $serviceFactory;
    
    protected $actionProcessor;

    public function __construct($wsdl, SoapServiceFactory $serviceFactory, ActionProcessor $actionProcessor)
    {
        $this->wsdl = $wsdl;
        $this->serviceFactory = $serviceFactory;
        $this->actionProcessor = $actionProcessor;
    }

    public function getAll()
    {
        $serviceHandler = $this->createSoapService($this->wsdl, null);
        $serviceTable = json_decode(
            $this->actionProcessor->processByServiceAndMethodName($serviceHandler, 'getSoapServices')
        );
        $soapServices = [];
        if (is_array($serviceTable)) {
            foreach ($serviceTable as $serviceObj) {
                $soapServices[] = $this->createSoapService($serviceObj->wsdl, $serviceObj->location);
            }
        }

        return $soapServices;
    }

    public function createSoapService($wsdl, $location)
    {
        $service = $this->serviceFactory->create($wsdl);
        return $service;
    }
}

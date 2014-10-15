<?php

namespace Bxav\Bundle\ServiceHandlerClientBundle\Model;

class SoapAction
{

    protected $service;
    
    protected $methodName;
    
    public function __construct(SoapService $soapService, $methodName)
    {
        $this->service = $soapService;
        $this->methodName = $methodName;
    }
    
    public function getService()
    {
        return $this->service;
    }

    public function getMethodName()
    {
        return $this->methodName;
    }
}

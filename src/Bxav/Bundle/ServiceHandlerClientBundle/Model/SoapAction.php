<?php

namespace Bxav\Bundle\ServiceHandlerClientBundle\Model;

class SoapAction
{

    protected $service;
    
    protected $methodName;
    
    protected $arguments;
    
    protected $returnType;
    
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

    public function setArguments($arguments)
    {
        $this->arguments = serialize($arguments);
    }

    public function getArguments()
    {
        /*
         * should return:
         * [
         *      [ 'type' => 'whatever','value' => 'someValue'],
         *      [ 'type' => 'whatever','value' => 'someValue'] 
         * ]
         */
        return unserialize($this->arguments);
    }
    
    public function getValueArguments()
    {
        $arrValue = [];
        foreach ($this->getArguments() as $coupleTypeValue) {
            $arrValue[] = $coupleTypeValue['value'];
        }
        return $arrValue;
    }

    public function setReturnType($returnType)
    {
        $this->returnType = $returnType;
    }

    public function getReturnType()
    {
        return $this->returnType;
    }
}

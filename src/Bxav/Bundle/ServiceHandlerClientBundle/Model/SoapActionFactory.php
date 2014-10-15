<?php
namespace Bxav\Bundle\ServiceHandlerClientBundle\Model;

interface SoapActionFactory
{
    /**
     * @param SoapService $soapService
     * @param string $methodName
     * @return SoapAction
     */
    public function create(SoapService $soapService, $methodName);
}
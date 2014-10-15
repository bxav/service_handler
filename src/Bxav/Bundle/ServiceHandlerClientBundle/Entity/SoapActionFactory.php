<?php
namespace Bxav\Bundle\ServiceHandlerClientBundle\Entity;

use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapActionFactory as SoapActionFactoryBase;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapService;

class SoapActionFactory implements SoapActionFactoryBase
{

    /**
     * {@inheritdoc}
     */
    public function create(SoapService $soapService, $methodName)
    {
        return new SoapAction($soapService, $methodName);
    }
}
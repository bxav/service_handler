<?php

namespace Bxav\Bundle\ServiceHandlerClientBundle\Model;

class ActionProcessor
{

    protected $clientFactory;

    public function __construct(SoapClientFactory $clientFactory)
    {
        $this->clientFactory = $clientFactory;
    }

    public function process(SoapAction $action)
    {
        $client = $this->clientFactory->get($action->getService()->getWsdl());
        return $client->call($action->getMethodName(), $action->getValueArguments());
    }
    
    public function processByServiceAndMethodName(SoapService $service, $methodName)
    {
        $client = $this->clientFactory->get($service->getWsdl());
        return $client->call($methodName);
    }

}

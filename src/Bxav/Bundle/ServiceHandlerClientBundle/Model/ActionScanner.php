<?php
namespace Bxav\Bundle\ServiceHandlerClientBundle\Model;

class ActionScanner
{

    protected $clientFactory;
    
    protected $actionFactory;

    public function __construct(SoapClientFactory $clientFactory, SoapActionFactory $actionFactory)
    {
        $this->clientFactory = $clientFactory;
        $this->actionFactory = $actionFactory;
    }

    /**
     *
     * @param SoapService $service            
     * @return array $actions
     */
    public function scanServiceForAction(SoapService $service)
    {
        $client = $this->clientFactory->get($service->getWsdl());
        $actions = [];
        foreach ($client->getFunctions() as $action) {
            $actions[] = $this->actionFactory->create($service, $action[1]);
        }
        return $actions;
    }
}

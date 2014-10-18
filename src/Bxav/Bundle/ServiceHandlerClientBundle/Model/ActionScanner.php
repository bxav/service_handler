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
            $actionObj = $this->actionFactory->create($service, $action[1]);
            $actionObj->setReturnType($action[0]);
            
            $actionObj->setArguments($this->findArguments($action));
            $actions[] = $actionObj;
        }
        return $actions;
    }
    
    protected function findArguments($arr) {
        // slice after the method name
        // array is like 
        /*
         * Array
         *  (
         *       [0] => boolean
         *       [1] => sendMail
         *       [2] => string
         *       [3] => $from
         *       [4] => string
         *       [5] => $to
         *       [6] => string
         *       [7] => $object
         *       [8] => string
         *       [9] => $body
         *       [10] => 
         *   )
         */
        $arrArguments = array_slice($arr, 2);
        $newArrArguments = [];
        // all the 2 is a key => value couple
        // the last one need to be remove... -1
        for ($i = 0; $i < count($arrArguments) - 1; $i += 2) {
            $newArrArguments[] = ['type' => $arrArguments[$i], 'value' => $arrArguments[$i + 1]];
        }
        return $newArrArguments;
    }
}

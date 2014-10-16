<?php
namespace Bxav\Bundle\ServiceHandlerClientBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapServiceRepository;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\ActionScanner;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\ActionProcessor;

use Bxav\Bundle\ServiceHandlerClientBundle\Model\ServiceSynchronizer;

class DemoController
{

    protected $serviceRepo;

    protected $em;

    protected $actionScanner;

    protected $actionProcessor;
    
    protected $synchronizer;
    
    public function __construct(
        SoapServiceRepository $serviceRepo,
        ActionScanner $actionScanner,
        ActionProcessor $actionProcessor,
        ServiceSynchronizer $synchronizer
    ) {
        $this->serviceRepo = $serviceRepo;
        $this->actionScanner = $actionScanner;
        $this->actionProcessor = $actionProcessor;
        $this->synchronizer = $synchronizer;
    }

    public function indexAction()
    {
        $res = $this->serviceRepo->getAll();
        
        foreach ($res as $service) {
        
            $service->setActions($this->actionScanner->scanServiceForAction($service));
            $actions = $service->getActions();
            foreach ($actions as $action) {
                print_r($this->actionProcessor->process($action));
            }
        }
        
        
        return new JsonResponse();
    }

    public function syncAction()
    {
        $this->synchronizer->synchronize();
        
        return new JsonResponse();
    }
}

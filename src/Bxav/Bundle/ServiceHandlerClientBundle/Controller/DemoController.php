<?php
namespace Bxav\Bundle\ServiceHandlerClientBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapServiceRepository;
use Doctrine\ORM\EntityManager;
use Bxav\Bundle\ServiceHandlerClientBundle\Entity\SoapAction;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\ActionScanner;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\ActionProcessor;

class DemoController
{

    protected $serviceRepo;

    protected $em;

    protected $actionScanner;

    protected $actionProcessor;
    
    public function __construct(
        SoapServiceRepository $serviceRepo,
        EntityManager $em,
        ActionScanner $actionScanner,
        ActionProcessor $actionProcessor
    ) {
        $this->serviceRepo = $serviceRepo;
        $this->em = $em;
        $this->actionScanner = $actionScanner;
        $this->actionProcessor = $actionProcessor;
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
        $res = $this->serviceRepo->getAll();
        
        foreach ($res as $service) {
            
            $service->setActions($this->actionScanner->scanServiceForAction($service));
            $actions = $service->getActions();
            foreach ($actions as $action) {
                $this->em->persist($action);
            }
            $this->em->persist($service);
        }
        
        $this->em->flush();
        
        return new JsonResponse($res[0]->getActions());
    }
}

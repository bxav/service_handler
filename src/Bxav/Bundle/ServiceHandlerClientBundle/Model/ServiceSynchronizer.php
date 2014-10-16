<?php

namespace Bxav\Bundle\ServiceHandlerClientBundle\Model;

use Doctrine\ORM\EntityManager;

class ServiceSynchronizer
{
    protected $serviceRepo;
    
    protected $em;
    
    protected $actionScanner;
    
    protected $actionProcessor;
    
    public function __construct(
        SoapServiceRepository $serviceRepo,
        EntityManager $em,
        ActionScanner $actionScanner
    ) {
        $this->serviceRepo = $serviceRepo;
        $this->em = $em;
        $this->actionScanner = $actionScanner;
    }

    public function synchronize()
    {
        $res = $this->serviceRepo->getAll();
        $serviceRepository = $this->em->getRepository('BxavServiceHandlerClientBundle:SoapService');
        $actionRepository = $this->em->getRepository('BxavServiceHandlerClientBundle:SoapAction');
        
        foreach ($res as $service) {
            $serviceTemp = $serviceRepository->findOneByWsdl($service->getWsdl());
            $service = is_null($serviceTemp) ? $service : $serviceTemp;

            foreach ($this->actionScanner->scanServiceForAction($service) as $action) {
                $actionTemp = $actionRepository->findOneBy(['methodName' => $action->getMethodName(), 'service' => $service]);
                $action = is_null($actionTemp) ? $action : $actionTemp;

                $this->em->persist($action);
            }
            $this->em->persist($service);
        }
        
        $this->em->flush();
    }
}

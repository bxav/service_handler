<?php

namespace Bxav\Bundle\ServiceHandlerBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Bxav\Bundle\ServiceHandlerBundle\Model\ServiceProviderChain;
use Bxav\Bundle\ServiceHandlerBundle\Entity\ServiceProvider;

class ServiceProviderCommand extends Command
{
    
    protected $serviceProviderRepository;
    
    protected $serviceProviderChain;
    
    protected $em;
    
    public function __construct(EntityManager $em, ServiceProviderChain $serviceProviderChain)
    {
        $this->serviceProviderChain = $serviceProviderChain;
        $this->serviceProviderRepository = $em->getRepository('BxavServiceHandlerBundle:ServiceProvider');
        $this->em = $em;
        parent::__construct();
    }
    
    protected function configure()
    {
        $this->setName('serice_handler:dump:db')
            ->setDescription('dump the different services in db');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        foreach ($this->serviceProviderChain->getServiceProviders() as $key => $serviceP) {
            $entityService = $this->serviceProviderRepository->findOneByServiceName($key);
            if (is_null($entityService)) {
                $entityService = new ServiceProvider($serviceP->getService());
                $entityService->setServiceName($key);
            }
            $entityService->setUrlLocation($serviceP->getUrlLocation());
            $entityService->setWsdlPath($serviceP->getWsdlPath());
            $entityService->setWsdlUrl($serviceP->getWsdlUrl());
            $this->em->persist($entityService);
        }  

        $this->em->flush();
        
        $output->writeln('end');
    }
}
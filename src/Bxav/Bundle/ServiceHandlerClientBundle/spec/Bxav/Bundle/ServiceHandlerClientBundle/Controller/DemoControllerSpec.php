<?php

namespace spec\Bxav\Bundle\ServiceHandlerClientBundle\Controller;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Doctrine\ORM\EntityManager;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapServiceRepository;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\ActionScanner;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\ActionProcessor;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\ServiceSynchronizer;

class DemoControllerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Bundle\ServiceHandlerClientBundle\Controller\DemoController');
    }
    
    function let(
        SoapServiceRepository $serviceRepo,
        ActionScanner $actionScanner,
        ActionProcessor $actionProcessor,
        ServiceSynchronizer $synchronizer
    ) {
        $this->beConstructedWith($serviceRepo, $actionScanner, $actionProcessor, $synchronizer);
    }
}

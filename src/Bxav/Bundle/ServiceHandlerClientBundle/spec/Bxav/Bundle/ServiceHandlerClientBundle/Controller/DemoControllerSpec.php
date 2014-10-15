<?php

namespace spec\Bxav\Bundle\ServiceHandlerClientBundle\Controller;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Doctrine\ORM\EntityManager;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapServiceRepository;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\ActionScanner;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\ActionProcessor;

class DemoControllerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Bundle\ServiceHandlerClientBundle\Controller\DemoController');
    }
    
    function let(
        SoapServiceRepository $serviceRepo,
        EntityManager $em,
        ActionScanner $actionScanner,
        ActionProcessor $actionProcessor
    ) {
        $this->beConstructedWith($serviceRepo, $em, $actionScanner, $actionProcessor);
    }
}

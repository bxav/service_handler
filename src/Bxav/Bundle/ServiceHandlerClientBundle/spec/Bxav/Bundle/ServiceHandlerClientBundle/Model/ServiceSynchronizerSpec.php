<?php
namespace spec\Bxav\Bundle\ServiceHandlerClientBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Doctrine\ORM\EntityManager;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapServiceRepository;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\ActionScanner;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\ActionProcessor;

class ServiceSynchronizerSpec extends ObjectBehavior
{

    protected $clientFactory;
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Bundle\ServiceHandlerClientBundle\Model\ServiceSynchronizer');
    }
    
    function let(
        SoapServiceRepository $serviceRepo,
        EntityManager $em,
        ActionScanner $actionScanner,
        ActionProcessor $actionProcessor
    ) {
        $this->beConstructedWith($serviceRepo, $em, $actionScanner, $actionProcessor);
    }

    function it_synchronizes_all_services()
    {
        @$this->synchronize();
    }
}

<?php
namespace spec\Bxav\Bundle\ServiceHandlerClientBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapService;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapClientFactory;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapActionFactory;

class ActionScannerSpec extends ObjectBehavior
{
    
    protected $clientFactory;

    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Bundle\ServiceHandlerClientBundle\Model\ActionScanner');
    }
    
    function let(SoapClientFactory $clientFactory, SoapActionFactory $actionFactory)
    {
        $this->beConstructedWith($clientFactory, $actionFactory);
        $this->clientFactory = $clientFactory;
    }

    function it_should_scan_service_and_return_its_action(SoapService $service)
    {
        $this->_initMockClientFactory();
        $this->scanServiceForAction($service);
    }
    
    private function _initMockClientFactory()
    {
        $prophet = new \Prophecy\Prophet;
        $client = $prophet->prophesize("Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapClient");
        $client->getFunctions()->willReturn([]);
        $this->clientFactory->get(Argument::any())->willReturn($client);
    }
}

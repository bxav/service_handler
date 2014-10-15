<?php
namespace spec\Bxav\Bundle\ServiceHandlerClientBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapAction;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapClientFactory;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapService;

class ActionProcessorSpec extends ObjectBehavior
{

    protected $clientFactory;
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Bundle\ServiceHandlerClientBundle\Model\ActionProcessor');
    }
    
    function let(SoapClientFactory $clientFactory)
    {
        $this->beConstructedWith($clientFactory);
        $this->clientFactory = $clientFactory;
    }

    function it_process_an_action(SoapAction $action, SoapService $service)
    {
        $action->getService()->willReturn($service);
        $action->getMethodName()->willReturn("methodName");
        
        $service->getWsdl()->willReturn("string");
        
        $this->_initMockClientFactory();
        
        $this->process($action);
    }
    
    private function _initMockClientFactory()
    {
        $prophet = new \Prophecy\Prophet;
        $client = $prophet->prophesize("Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapClient");
        $this->clientFactory->get(Argument::any())->willReturn($client);
    }
}

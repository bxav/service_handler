<?php

namespace spec\Bxav\Bundle\ServiceHandlerBundle\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Bxav\Bundle\ServiceHandlerBundle\Model\ServiceProviderChain;

class SoapServiceManagerServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Bundle\ServiceHandlerBundle\Service\SoapServiceManagerService');
    }
    
    protected $serviceProviderChain;
    
    function let(ServiceProviderChain $serviceProviderChain)
    {
        $this->beConstructedWith($serviceProviderChain);
        $this->serviceProviderChain = $serviceProviderChain;
    }
    
    function it_should_give_a_json_sring_resumate_all_soap_services()
    {
        $this->serviceProviderChain->getServiceProviders()->willReturn([]);
        $this->getSoapServices()->shouldBeString();
    }
}

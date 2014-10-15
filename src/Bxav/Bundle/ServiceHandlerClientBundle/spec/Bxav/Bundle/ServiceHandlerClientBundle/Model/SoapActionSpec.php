<?php

namespace spec\Bxav\Bundle\ServiceHandlerClientBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapService;

class SoapActionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapAction');
    }
    
    function let(SoapService $soapService, $methodName)
    {
        $this->beConstructedWith($soapService, $methodName);
    }
    
    function it_should_have_methodname_by_default()
    {
        $this->getMethodName()->shouldNotBeNull();
    }
}

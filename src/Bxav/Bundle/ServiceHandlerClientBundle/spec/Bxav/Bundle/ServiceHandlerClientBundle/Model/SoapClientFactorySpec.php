<?php
namespace spec\Bxav\Bundle\ServiceHandlerClientBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PhpSoapClientFactorySpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapClientFactory');
    }
}

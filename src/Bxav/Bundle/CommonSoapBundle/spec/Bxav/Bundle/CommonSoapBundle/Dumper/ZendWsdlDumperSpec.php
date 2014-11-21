<?php
namespace spec\Bxav\Bundle\CommonSoapBundle\Dumper;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Bxav\Bundle\CommonSoapBundle\Model\ServiceProvider;

class ZendWsdlDumperSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Bundle\CommonSoapBundle\Dumper\ZendWsdlDumper');
    }
    
    function it_should_dump_the_wsdl(ServiceProvider $serviceProvider)
    {
        $this->shouldThrow('Zend\Soap\Exception\InvalidArgumentException')->duringDump($serviceProvider);
    }
}

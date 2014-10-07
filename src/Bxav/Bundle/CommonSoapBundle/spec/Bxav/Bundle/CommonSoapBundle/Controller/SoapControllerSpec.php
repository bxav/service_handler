<?php
namespace spec\Bxav\Bundle\CommonSoapBundle\Controller;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Bxav\Bundle\CommonSoapBundle\Model\ServiceProvider;

class SoapControllerSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Bundle\CommonSoapBundle\Controller\SoapController');
    }

    function let(ServiceProvider $serviceProvider)
    {
        $this->beConstructedWith($serviceProvider);
    }

    /**
     * @todo SoapServerFactory need to be inject, if not Soap fault
     *
    function it_sends_soap_response()
    {
        $this->serverAction()->shouldReturnAnInstanceOf('Symfony\Component\HttpFoundation\Response');
    }
     
     */
}

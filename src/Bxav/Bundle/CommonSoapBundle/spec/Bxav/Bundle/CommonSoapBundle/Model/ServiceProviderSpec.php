<?php

namespace spec\Bxav\Bundle\CommonSoapBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ServiceProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Bundle\CommonSoapBundle\Model\ServiceProvider');
    }
    
    function let($service)
    {
        $this->beConstructedWith($service);
    }
    
    function its_service_is_not_null_by_default()
    {
        $this->getService()->shouldNotBeNull();
    }
    
    function its_wsdl_path_is_mutable($wsdlPath)
    {
        $this->setWsdlPath($wsdlPath);
        $this->getWsdlPath()->shouldReturn($wsdlPath);
    }
    
    function its_wsdl_url_is_mutable($wsdlUrl)
    {
        $this->setWsdlUrl($wsdlUrl);
        $this->getWsdlUrl()->shouldReturn($wsdlUrl);
    }
    
    function its_url_location_is_mutable($location)
    {
        $this->setUrlLocation($location);
        $this->getUrlLocation()->shouldReturn($location);
    }
    
    function it_should_return_its_service_class_name()
    {
        $this->getServiceClassName()->shouldBeString();
    }
}

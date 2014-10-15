<?php

namespace spec\Bxav\Bundle\ServiceHandlerClientBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapService;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapClientFactory;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapClient;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapServiceFactory;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\ActionProcessor;

class SoapServiceRepositorySpec extends ObjectBehavior
{
    
    protected $serviceHandler;
    
    protected $serviceFactory;
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapServiceRepository');
    }
    
    function let($wsdl, SoapServiceFactory $serviceFactory, ActionProcessor $actionProcessor)
    {
        $this->beConstructedWith($wsdl, $serviceFactory, $actionProcessor);
        //$this->serviceHandler = $serviceHandler;
        $this->serviceFactory = $serviceFactory;
    }
    
    /*function it_should_get_all_service()
    {
        $this->_initMockServiceFactory();

        $returnByTheRemoteServer = '[{"wsdl":"http:\/\/127.0.0.1:8000\/api\/extra\/wsdl","location":"http:\/\/127.0.0.1:8000\/api\/extra"}]';
        
        $this->serviceHandler->call(Argument::any())->willReturn($returnByTheRemoteServer);
        $serviceToFind = $this->createSoapService("http://127.0.0.1:8000/api/extra/wsdl", "http://127.0.0.1:8000/api/extra");
        
        $this->getAll()->shouldContainSomethingLike($serviceToFind);
    }*/
    
    function it_creates_soap_service($wsdl, $location)
    {
        $this->_initMockServiceFactory();
        $this->createSoapService($wsdl, $location);
    }
    
    private function _initMockServiceFactory()
    {
        $prophet = new \Prophecy\Prophet;
        $service = $prophet->prophesize("Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapService");
        $this->serviceFactory->create(Argument::any())->willReturn($service);
    }
    
    public function getMatchers()
    {
        return [
        'containSomethingLike' => function($subject, $value) {
            if (! is_array($subject))
                return false;
            
            foreach ($subject as $obj) {
                if ($obj == $value)
                    return true;
            }
            
            return false;
        },
        ];
    }
}

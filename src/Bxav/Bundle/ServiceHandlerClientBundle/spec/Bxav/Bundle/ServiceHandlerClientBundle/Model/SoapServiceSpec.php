<?php

namespace spec\Bxav\Bundle\ServiceHandlerClientBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapAction;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapClient;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapActionFactory;

class SoapServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapService');
    }
    
    function let(SoapClient $client, SoapActionFactory $actionFactory)
    {
        $this->beConstructedWith($client, $actionFactory);
    }
    
    function it_should_not_have_action_by_default()
    {
        $this->shouldNotHaveActions();
    }
    
    function it_should_add_action(SoapAction $action)
    {
        $this->addAction($action);
        $this->shouldHaveAction($action);
    }
}

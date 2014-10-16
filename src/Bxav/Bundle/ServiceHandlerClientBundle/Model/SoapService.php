<?php
namespace Bxav\Bundle\ServiceHandlerClientBundle\Model;

class SoapService
{

    protected $wsdl;

    protected $location = null;

    protected $client;

    protected $actions = [];

    public function __construct($wsdl)
    {
        $this->wsdl = $wsdl;
    }
    
    public function getWsdl()
    {
        return $this->wsdl;
    }

    public function hasActions()
    {
        return ! empty($this->actions);
    }

    public function addAction(SoapAction $action)
    {
        $this->actions[] = $action;
    }

    public function hasAction(SoapAction $action)
    {
        return in_array($action, $this->actions, true);
    }
    
    public function setActions(array $actions)
    {
        $this->actions = $actions;
    }
    
    public function getActions()
    {           
        return $this->actions;
    }
}
<?php

namespace Bxav\Bundle\ServiceHandlerClientBundle\Entity;

use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapService as ServiceBase;
use Doctrine\Common\Collections\ArrayCollection;
use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapAction as SoapActionBase;

class SoapService extends ServiceBase
{

    protected $id;

    public function __construct($wsdl) {
        parent::__construct($wsdl);
        $this->actions = new ArrayCollection();
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function hasAction(SoapActionBase $action)
    {
        $this->actions->contains($action);
    }
}

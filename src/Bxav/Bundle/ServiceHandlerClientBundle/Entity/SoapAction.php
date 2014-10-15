<?php

namespace Bxav\Bundle\ServiceHandlerClientBundle\Entity;

use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapAction as ActionBase;

class SoapAction extends ActionBase
{

    protected $id;

    public function getId()
    {
        return $this->id;
    }
}

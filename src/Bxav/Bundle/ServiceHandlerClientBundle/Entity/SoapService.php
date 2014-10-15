<?php

namespace Bxav\Bundle\ServiceHandlerClientBundle\Entity;

use Bxav\Bundle\ServiceHandlerClientBundle\Model\SoapService as ServiceBase;

class SoapService extends ServiceBase
{

    protected $id;

    public function getId()
    {
        return $this->id;
    }
}

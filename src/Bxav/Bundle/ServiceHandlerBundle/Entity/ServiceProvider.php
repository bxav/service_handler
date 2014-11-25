<?php
namespace Bxav\Bundle\ServiceHandlerBundle\Entity;

use Bxav\Bundle\CommonSoapBundle\Model\ServiceProvider as ServiceProviderBase;

class ServiceProvider extends ServiceProviderBase
{

    protected $id;
    
    protected $serviceName;

    public function getId()
    {
        return $this->id;
    }

    public function getServiceName()
    {
        return $this->serviceName;
    }

    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
        return $this;
    }
 
}
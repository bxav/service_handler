<?php
namespace Bxav\Bundle\CommonSoapBundle\Model;

class ServiceProvider
{
    
    protected $service;
    
    protected $wsdlUrl = '';

    protected $urlLocation = '';
    
    protected $wsdlPath = '';
    
    public function __construct($service)
    {
        $this->service = $service;
    }

    public function setWsdlPath($wsdlPath)
    {
        $this->wsdlPath = $wsdlPath;
    }
    
    public function getWsdlPath()
    {
        return $this->wsdlPath;
    }
    
    public function setWsdlUrl($wsdlUrl)
    {
        $this->wsdlUrl = $wsdlUrl;
    }
    
    public function getWsdlUrl()
    {
        return $this->wsdlUrl;
    }
    
    public function setUrlLocation($urlLocation)
    {
        $this->urlLocation = $urlLocation;
    }
    
    public function getUrlLocation()
    {
        return $this->urlLocation;
    }
    
    public function getService()
    {
        return $this->service;
    }
    
    public function getServiceClassName()
    {
        return get_class($this->getService());
    }
    
}
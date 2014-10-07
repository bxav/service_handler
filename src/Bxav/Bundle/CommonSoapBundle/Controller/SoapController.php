<?php

namespace Bxav\Bundle\CommonSoapBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Zend\Soap\AutoDiscover;
use Bxav\Bundle\CommonSoapBundle\Model\ServiceProvider;

class SoapController
{    
    
    protected $serviceProvider;
    
    public function __construct(ServiceProvider $serviceProvider)
    {
        $this->serviceProvider = $serviceProvider;
    }
    
    protected function getServiceProvider()
    {
        return $this->serviceProvider;
    }
    
    public function serverAction()
    {
        ini_set("soap.wsdl_cache", "0");
        ini_set("soap.wsdl_cache_enabled", "0");

        ini_set('soap.wsdl_cache_ttl',0);
        $filePath = $this->getServiceProvider()->getWsdlPath();
        $soap = new \SoapServer($filePath);
        $soap->setObject($this->getServiceProvider()->getService());
        
        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml');
        ob_start();
        $soap->handle();
        $response->setContent(ob_get_clean());
        
        return $response;
    }
    
    public function getWsdlAction()
    {
        $filePath = $this->getServiceProvider()->getWsdlPath();
        
        $file = file_get_contents($filePath);
        
        return new Response($file, 200, ['Content-Type' => 'text/xml']);
    }
    
    public function dumperAction()
    {

        ini_set("soap.wsdl_cache", "0");
        ini_set("soap.wsdl_cache_enabled", "0");

        ini_set('soap.wsdl_cache_ttl',0);
        


        $filePath = $this->getServiceProvider()->getWsdlPath();
        
        $autodiscover = new AutoDiscover();
        $autodiscover->setClass($this->getServiceProvider()->getServiceClassName())
            ->setUri($this->getServiceProvider()->getUrlLocation())
            ->setServiceName('MySoapService');
        $autodiscover->dump($filePath);
        return new Response("OK", 201);
    }
}

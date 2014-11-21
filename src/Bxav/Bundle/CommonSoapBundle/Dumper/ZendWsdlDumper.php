<?php
namespace Bxav\Bundle\CommonSoapBundle\Dumper;

use Bxav\Bundle\CommonSoapBundle\Model\ServiceProvider;
use Zend\Soap\AutoDiscover;

class ZendWsdlDumper
{


    public function dump(ServiceProvider $serviceProvider)
    {
        ini_set("soap.wsdl_cache", "0");
        ini_set("soap.wsdl_cache_enabled", "0");
        
        ini_set('soap.wsdl_cache_ttl', 0);
        
        $filePath = $serviceProvider->getWsdlPath();
        
        $autodiscover = new AutoDiscover();
        $autodiscover->setClass($serviceProvider
            ->getServiceClassName())
            ->setUri($serviceProvider->getUrlLocation())
            ->setServiceName('MySoapService');
        $autodiscover->dump($filePath);
    }
}

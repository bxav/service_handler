<?php
namespace Bxav\Bundle\ServiceHandlerClientBundle\Model;

class SoapClientFactory
{

    public function get($wsdl)
    {
        return new SoapClient($wsdl);
    }
}


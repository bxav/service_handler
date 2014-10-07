<?php
namespace Bxav\Bundle\ServiceHandlerBundle\Model;

class ServiceProviderChain
{

    private $serviceProviders;

    public function __construct()
    {
        $this->serviceProviders = [];
    }

    public function addServiceProvider($serviceProvider, $aliasProvider)
    {
        $this->serviceProviders[$aliasProvider] = $serviceProvider;
    }

    public function getServiceProvider($aliasProvider)
    {
        if (array_key_exists($aliasProvider, $this->serviceProviders)) {
            return $this->serviceProviders[$aliasProvider];
        }
    }

    public function getServiceProviders()
    {
        return $this->serviceProviders;
    }
}
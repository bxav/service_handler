<?php
namespace Bxav\Bundle\ServiceHandlerClientBundle\Model;

class SoapClientFactory
{

    protected $userId;

    protected $apiKey;

    public function __construct($userId, $apiKey)
    {
        $this->userId = $userId;
        $this->apiKey = $apiKey;
    }

    public function get($wsdl)
    {
        return new SoapClient($wsdl, $this->userId, $this->apiKey);
    }
}


<?php
namespace Bxav\Bundle\ServiceHandlerClientBundle\Model;

class SoapClient
{

    protected $client;
    
    protected $wsdl;

    public function __construct($wsdl, $username, $pw)
    {
        $options = array(
            'login' => $username,
            'password' => $pw,
        );
        
        $this->client = new \SoapClient($wsdl, $options);
        $this->wsdl = $wsdl;
    }

    public function getWsdl()
    {
        return $this->wsdl;
    }
    
    public function call($methodName, array $arguments = [])
    {
        return $this->client->__soapCall($methodName, $arguments);
    }

    
    /**
     * exemple return:
     * Array
     * (Array(
     *     [0] => $returnType
     *     [1] => $methodName
     *     [2] => $paramType
     *     [3] => $paramName
     * ))
     * 
     * @return array
     */
    public function getFunctions()
    {
        $res = [];
        foreach ($this->client->__getFunctions() as $functionPrototype) {
            $ready = str_replace([' ','(',')'], ',', $functionPrototype);
            $ready = str_replace([',,'], ',', $ready);
            
            $res[] = explode(',',$ready);
            
        }
        
        return $res;
    }
}

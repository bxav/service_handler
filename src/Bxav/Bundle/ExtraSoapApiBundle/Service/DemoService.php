<?php
namespace Bxav\Bundle\ExtraSoapApiBundle\Service;

class DemoService
{
    public $test = "coucou"; 

    /**
     * 
     * @param string $from
     * @param string $to
     * @param string $object
     * @param string $body
     * @return boolean
     */
    public function sendMail($from, $to, $object, $body)
    {
        $valid = true;
        return $valid;
    }
    
    /**
     * 
     * @param string $instanceName
     * @return boolean
     */
    public function installCRM($instanceName)
    {
        $valid = true;
        return $valid;
    }
    
    /**
     * 
     * @param string $instanceName
     * @return boolean
     */
    public function buildCRM($instanceName)
    {
        $valid = true;
        sleep(5);
        return $valid;
    }
    
    /**
     *
     * @param string $instanceName
     * @return boolean
     */
    public function buildWebsite($instanceName)
    {
        $valid = true;
        sleep(10);
        return $valid;
    }
    
    /**
     *
     * @param string $instanceName
     * @return boolean
     */
    public function buildDataBox($instanceName)
    {
        $valid = true;
        return $valid;
    }
    
    /**
     *
     * @param int $spaceInGB
     * @param string $instanceName
     * @return boolean
     */
    public function addSpaceToDataBox($spaceInGB, $instanceName)
    {
        $valid = true;
        return $valid;
    }
    
    /**
     *
     * @return array $services
     */
    public function getServices()
    {
        return [
            "orocrm",
            "mailer",
            "tester"
        ];
    }
}

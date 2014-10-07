<?php
namespace Bxav\Bundle\ExtraSoapApiBundle\Service;

class DemoService
{
    public $test = "coucou"; 

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

<?php
namespace Bxav\Bundle\CommonSoapBundle\Behat;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Doctrine\ORM\EntityManager;
use Behat\Symfony2Extension\Context\KernelAwareContext;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Defines application features from the specific context.
 */
abstract class SoapContext implements KernelAwareContext
{
    
    abstract protected function getServiceProviderName();
    
    public function getSoapClient()
    {
        if ($this->client === null) {
            $serviceProvider = $this->getService($this->getServiceProviderName());
            $this->client = new \SoapClient($serviceProvider->getWsdlPath(), array(
                'login' => 'admin',
                'password' => 'admin'
            ));
        }
        return $this->client;
    }
    
    /**
     * @BeforeScenario
     */
    public function initSoapCache()
    {
        ini_set("soap.wsdl_cache", "0");
        ini_set("soap.wsdl_cache_enabled", "0");
    
        ini_set('soap.wsdl_cache_ttl', 0);
    
    }

    /**
     *
     * @var KernelInterface
     */
    protected $kernel;

    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * Get service by id.
     *
     * @param string $id            
     *
     * @return object
     */
    protected function getService($id)
    {
        return $this->getContainer()->get($id);
    }

    /**
     * Returns Container instance.
     *
     * @return ContainerInterface
     */
    protected function getContainer()
    {
        return $this->kernel->getContainer();
    }
}

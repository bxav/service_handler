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
class SoapContext implements KernelAwareContext
{

    protected $soapClientFactory;

    public function __construct()
    {
        $this->soapClientFactory = $this->getSoapFactory();
    }

    /**
     *
     * @var KernelInterface
     */
    protected $kernel;

    /**
     * @ERROR!!!
     */
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

    protected function getSoapFactory()
    {
        $soapClientFactory = new \stdClass();
        $soapClientFactory->create = function ($wsdl) {
            return new \SoapClient($wsdl);
        };
        return $soapClientFactory;
    }
}

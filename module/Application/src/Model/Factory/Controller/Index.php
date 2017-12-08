<?php
namespace Application\Model\Factory\Controller;

use Application\Controller\Index as IndexController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class Index implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new IndexController();
    }
}

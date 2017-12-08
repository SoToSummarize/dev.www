<?php
namespace Application\Model\Factory\Controller;

use Application\Controller\Login as LoginController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class Login implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new LoginController();
    }
}

<?php
namespace Application\Model\Factory\Controller;

use Application\Controller\Register as RegisterController;
use Interop\Container\ContainerInterface;
use LeoGalleguillos\Flash\Model\Service\Flash as FlashService;
use Zend\ServiceManager\Factory\FactoryInterface;

class Register implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new RegisterController(
            $container->get(FlashService::class)
        );
    }
}

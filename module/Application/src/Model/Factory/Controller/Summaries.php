<?php
namespace Application\Model\Factory\Controller;

use Application\Controller\Summaries as SummariesController;
use Interop\Container\ContainerInterface;
use LeoGalleguillos\Summary\Model\Factory\Summary as SummaryFactory;
use Zend\ServiceManager\Factory\FactoryInterface;

class Summaries implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new SummariesController(
            $container->get(SummaryFactory::class)
        );
    }
}

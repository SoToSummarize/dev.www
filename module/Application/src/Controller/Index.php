<?php
namespace Application\Controller;

use LeoGalleguillos\Summary\Model\Factory as SummaryFactory;
use Zend\Mvc\Controller\AbstractActionController;

class Index extends AbstractActionController
{
    public function __construct(
        SummaryFactory\Summary $summaryFactory
    ) {
        $this->summaryFactory = $summaryFactory;
    }

    public function indexAction()
    {
        $summaryEntities = [];
        for ($x = 1; $x <= 10; $x++) {
            $summaryEntities[] = $this->summaryFactory->buildFromSummaryId($x);
        }

        return [
            'summaryEntities' => $summaryEntities,
        ];
    }
}

<?php
namespace Application\Controller;

use LeoGalleguillos\Summary\Model\Factory as SummaryFactory;
use LeoGalleguillos\Summary\Model\Table as SummaryTable;
use Zend\Mvc\Controller\AbstractActionController;

class Index extends AbstractActionController
{
    public function __construct(
        SummaryFactory\Summary $summaryFactory,
        SummaryTable\Summary $summaryTable
    ) {
        $this->summaryFactory = $summaryFactory;
        $this->summaryTable   = $summaryTable;
    }

    public function indexAction()
    {
        $summaryEntities = [];
        for ($x = 1; $x <= 12; $x++) {
            $summaryEntities[] = $this->summaryFactory->buildFromSummaryId($x);
        }

        return [
            'summaryEntities' => $summaryEntities,
        ];
    }
}

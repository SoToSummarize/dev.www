<?php
namespace Application\Controller;

use LeoGalleguillos\Summary\Model\Factory\Summary as SummaryFactory;
use Zend\Mvc\Controller\AbstractActionController;

class Summaries extends AbstractActionController
{
    public function __construct(
        SummaryFactory $summaryFactory
    ) {
        $this->summaryFactory = $summaryFactory;
    }

    public function viewAction()
    {
        $summaryId = $this->params()->fromRoute('summaryId');

        return [
            'summaryEntity' => $this->summaryFactory->buildFromSummaryId($summaryId),
        ];
    }
}

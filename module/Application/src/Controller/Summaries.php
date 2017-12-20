<?php
namespace Application\Controller;

use LeoGalleguillos\Summary\Model\Factory\Summary as SummaryFactory;
use LeoGalleguillos\Summary\Model\Service\Summary as SummaryService;
use Zend\Mvc\Controller\AbstractActionController;

class Summaries extends AbstractActionController
{
    public function __construct(
        SummaryFactory $summaryFactory,
        SummaryService $summaryService
    ) {
        $this->summaryFactory = $summaryFactory;
        $this->summaryService = $summaryService;
    }

    public function viewAction()
    {
        $summaryId      = $this->params()->fromRoute('summaryId');
        $summaryEntity  = $this->summaryFactory->buildFromSummaryId($summaryId);
        $sourceEntities = $this->summaryService->getSourceEntities($summaryEntity);

        return [
            'summaryEntity'  => $summaryEntity,
            'sourceEntities' => $sourceEntities,
        ];
    }
}

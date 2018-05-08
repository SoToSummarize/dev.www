<?php
namespace Application\Controller;

use LeoGalleguillos\Html\Model\Service as HtmlService;
use LeoGalleguillos\Sentence\Model\Service as SentenceService;
use LeoGalleguillos\String\Model\Service as StringService;
use LeoGalleguillos\Summary\Model\Factory as SummaryFactory;
use Zend\Mvc\Controller\AbstractActionController;

class Summaries extends AbstractActionController
{
    public function __construct(
        SentenceService\Variations $variationsService,
        SummaryFactory\Summary $summaryFactory
    ) {
        $this->variationsService          = $variationsService;
        $this->summaryFactory             = $summaryFactory;
    }

    public function viewAction()
    {
        $summaryId = $this->params()->fromRoute('summaryId');
        $summaryEntity = $this->summaryFactory->buildFromSummaryId(
            $summaryId
        );

        $titleVariations = $this->variationsService->getVariations(
            $summaryEntity->getWebpage()->getTitle(),
            5,
            strlen($summaryEntity->getWebpage()->getTitle())
        );

        return [
            'summaryEntity'   => $summaryEntity,
            'titleVariations' => $titleVariations,
        ];
    }
}

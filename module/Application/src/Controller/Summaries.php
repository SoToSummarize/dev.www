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
        HtmlService\WordsOnly $wordsOnlyService,
        SentenceService\Variations $variationsService,
        StringService\NGrams\SortedByCount $nGramsSortedByCountService,
        SummaryFactory\Summary $summaryFactory
    ) {
        $this->wordsOnlyService           = $wordsOnlyService;
        $this->variationsService          = $variationsService;
        $this->nGramsSortedByCountService = $nGramsSortedByCountService;
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
            3,
            strlen($summaryEntity->getWebpage()->getTitle())
        );

        $nGrams = $this->nGramsSortedByCountService->getNGramsSortedByCount(
            $this->wordsOnlyService->getWordsOnly(
                $summaryEntity->getWebpage()->getHtml()->getString()
            ),
            1,
            4
        );

        return [
            'nGrams'          => $nGrams,
            'summaryEntity'   => $summaryEntity,
            'titleVariations' => $titleVariations,
        ];
    }
}

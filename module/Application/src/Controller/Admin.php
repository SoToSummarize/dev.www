<?php
namespace Application\Controller;

use LeoGalleguillos\Summary\Model\Service as SummaryService;
use Zend\Mvc\Controller\AbstractActionController;

class Admin extends AbstractActionController
{
    public function __construct(
        SummaryService\SummaryEntities $summaryEntitiesService
    ) {
        $this->summaryEntitiesService = $summaryEntitiesService;
    }

    public function indexAction()
    {
        return [
            'summaryEntities' => $this->summaryEntitiesService->getSummaryEntities(),
        ];
    }

    public function crawlAction()
    {

    }
}

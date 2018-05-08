<?php
namespace Application\Controller;

use LeoGalleguillos\Summary\Model\Service as SummaryService;
use LeoGalleguillos\Website\Model\Service as WebsiteService;
use Zend\Mvc\Controller\AbstractActionController;

class Admin extends AbstractActionController
{
    public function __construct(
        SummaryService\SummaryEntities $summaryEntitiesService,
        WebsiteService\Webpage\Html $htmlService
    ) {
        $this->summaryEntitiesService = $summaryEntitiesService;
        $this->htmlService            = $htmlService;
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

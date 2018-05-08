<?php
namespace Application\Controller;

use LeoGalleguillos\Html\Model\Service as HtmlService;
use LeoGalleguillos\Summary\Model\Service as SummaryService;
use LeoGalleguillos\Website\Model\Service as WebsiteService;
use Zend\Mvc\Controller\AbstractActionController;

class Admin extends AbstractActionController
{
    public function __construct(
        HtmlService\Title $titleService,
        SummaryService\SummaryEntities $summaryEntitiesService,
        WebsiteService\Webpage\Html $htmlService
    ) {
        $this->titleService           = $titleService;
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
        if (!empty($_POST)) {

        }
    }
}

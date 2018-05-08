<?php
namespace Application\Controller;

use LeoGalleguillos\Html\Model\Service as HtmlService;
use LeoGalleguillos\Summary\Model\Service as SummaryService;
use LeoGalleguillos\Website\Model\Service as WebsiteService;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class Admin extends AbstractActionController
{
    public function __construct(
        HtmlService\Title $titleService,
        SummaryService\SummaryEntities $summaryEntitiesService,
        WebsiteService\Webpage\Html $htmlService,
        WebsiteTable\Webpage $webpageTable
    ) {
        $this->titleService           = $titleService;
        $this->summaryEntitiesService = $summaryEntitiesService;
        $this->htmlService            = $htmlService;
        $this->webpageTable           = $webpageTable;
    }

    public function indexAction()
    {
        return [
            'summaryEntities' => $this->summaryEntitiesService->getSummaryEntities(),
        ];
    }

    public function crawlAction()
    {
        $viewModel = new ViewModel();

        if (!empty($_POST)) {
            $viewModel->setVariable('url', $_POST['url']);


        }

        return $viewModel;
    }
}

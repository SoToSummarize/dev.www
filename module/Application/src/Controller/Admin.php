<?php
namespace Application\Controller;

use Exception;
use LeoGalleguillos\Html\Model\Entity as HtmlEntity;
use LeoGalleguillos\Html\Model\Service as HtmlService;
use LeoGalleguillos\Summary\Model\Service as SummaryService;
use LeoGalleguillos\Summary\Model\Table as SummaryTable;
use LeoGalleguillos\Website\Model\Service as WebsiteService;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class Admin extends AbstractActionController
{
    public function __construct(
        HtmlService\Title $titleService,
        SummaryService\SummaryEntities $summaryEntitiesService,
        SummaryTable\Summary $summaryTable,
        WebsiteService\Webpage\Html $htmlService,
        WebsiteTable\Webpage $webpageTable
    ) {
        $this->titleService           = $titleService;
        $this->summaryEntitiesService = $summaryEntitiesService;
        $this->summaryTable           = $summaryTable;
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

            $htmlString  = $this->htmlService->getHtmlFromUrl($_POST['url']);
            $htmlEntity = new HtmlEntity\Html();
            $htmlEntity->setString($htmlString);
            $titleEntity = $this->titleService->getTitleFromHtml($htmlEntity);

            try {
                $webpageId = $this->webpageTable->insertIgnore(
                    null,
                    $_POST['url'],
                    $titleEntity->getValue(),
                    $htmlEntity->getString()
                );
                $viewModel->setVariable('webpageId', $webpageId);
            } catch (Exception $exception) {

            }
        }

        return $viewModel;
    }

    public function populateAction()
    {
        $maxWebpageId = $this->summaryTable->selectMaxWebpageId();
        $webpageIds   = $this->webpageTable->selectWebpageIdWhereWebpageIdGreaterThan(
            $maxWebpageId
        );
        foreach ($webpageIds as $webpageId) {
            $this->summaryTable->insert(
                $webpageId
            );
        }
    }
}

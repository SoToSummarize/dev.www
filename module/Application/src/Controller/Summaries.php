<?php
namespace Application\Controller;

use LeoGalleguillos\Summary\Model\Factory\Summary as SummaryFactory;
use Zend\Mvc\Controller\AbstractActionController;

class Summaries extends AbstractActionController
{
    public function __construct(
        SummaryFactory $summaryFactory
    ) {
    }

    public function viewAction()
    {

    }
}

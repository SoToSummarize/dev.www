<?php
namespace Application\Controller;

use LeoGalleguillos\Summary\Model\Factory as SummaryFactory;
use LeoGalleguillos\Summary\Model\Table as SummaryTable;
use Zend\Mvc\Controller\AbstractActionController;

class Index extends AbstractActionController
{
    public function __construct(
        SummaryFactory\Summary $summaryFactory,
        SummaryTable\Summary $summaryTable
    ) {
        $this->summaryFactory = $summaryFactory;
        $this->summaryTable   = $summaryTable;
    }

    public function indexAction()
    {
        $summaryEntities = [];
        foreach ($this->summaryTable->select() as $array) {
            $summaryEntities[] = $this->summaryFactory->buildFromArray($array);
        }

        return [
            'summaryEntities' => $summaryEntities,
        ];
    }
}

<?php
namespace Application\Controller;

use LeoGalleguillos\Flash\Model\Service\Flash as FlashService;
use Zend\Mvc\Controller\AbstractActionController;

class Register extends AbstractActionController
{
    public function __construct(
        FlashService $flashService
    ) {
        $this->flashService = $flashService;
    }

    public function indexAction()
    {
        if (!empty($_POST)) {
            return $this->registerAction();
        }

        return [
            'message' => $this->flashService->getMessage(),
        ];
    }

    private function registerAction()
    {
        $this->flashService->setMessage('Some fields were invalid.');
        return $this->redirect()->toRoute('register')->setStatusCode(303);
    }
}

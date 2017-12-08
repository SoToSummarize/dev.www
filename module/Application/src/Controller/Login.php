<?php
namespace Application\Controller;

use LeoGalleguillos\Flash\Model\Service\Flash as FlashService;
use Zend\Mvc\Controller\AbstractActionController;

class Login extends AbstractActionController
{
    public function __construct(
        FlashService $flashService
    ) {
        $this->flashService = $flashService;
    }

    public function indexAction()
    {
        if (!empty($_POST)) {
            return $this->loginAction();
        }

        return [
            'message' => $this->flashService->getMessage(),
        ];
    }

    private function loginAction()
    {
        $this->flashService->setMessage('Invalid username or password.');
        return $this->redirect()->toRoute('login')->setStatusCode(303);
    }
}

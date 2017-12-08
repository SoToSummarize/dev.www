<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class Login extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}

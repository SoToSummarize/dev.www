<?php
namespace Application;

use Application\Controller\Index as IndexController;
use Application\Controller\Login as LoginController;
use Application\Controller\Register as RegisterController;
use Application\Controller\Summaries as SummariesController;
use Application\Model\Factory\Controller\Index as IndexControllerFactory;
use Application\Model\Factory\Controller\Login as LoginControllerFactory;
use Application\Model\Factory\Controller\Register as RegisterControllerFactory;
use Application\Model\Factory\Controller\Summaries as SummariesControllerFactory;
use LeoGalleguillos\Facebook\View\Helper\ShareUrl as FacebookShareUrlHelper;
use LeoGalleguillos\Summary\View\Helper\Summary\FacebookShareUrl as SummaryFacebookShareUrlHelper;
use LeoGalleguillos\Twitter\View\Helper\ShareUrl as TwitterShareUrlHelper;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;


return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'login' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/login',
                    'defaults' => [
                        'controller' => LoginController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'register' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/register',
                    'defaults' => [
                        'controller' => RegisterController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'summaries' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/summaries/:summaryId/:summarySlug',
                    'defaults' => [
                        'controller' => SummariesController::class,
                        'action'     => 'view',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            IndexController::class     => IndexControllerFactory::class,
            LoginController::class     => LoginControllerFactory::class,
            RegisterController::class  => RegisterControllerFactory::class,
            SummariesController::class => SummariesControllerFactory::class,
        ],
    ],
    'view_helpers' => [
        'aliases' => [
            'facebookShareUrl' => FacebookShareUrlHelper::class,
            'summaryFacebookShareUrl'  => SummaryFacebookShareUrlHelper::class,
            'twitterShareUrl'  => TwitterShareUrlHelper::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];

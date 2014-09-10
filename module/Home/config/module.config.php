<?php

return array(
    'router' => array(
        'routes' => array(
            'home_login' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'Home\Controller\Authentification',
                        'action' => 'login',
                    ),
                ),
            ),
            'home_logout' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/logout',
                    'defaults' => array(
                        'controller' => 'Home\Controller\Authentification',
                        'action' => 'logout',
                    ),
                ),
            ),
            'home_inscription' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/inscription',
                    'defaults' => array(
                        'controller' => 'Home\Controller\Authentification',
                        'action' => 'inscription',
                    ),
                ),
            ),
            'home_connected' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/private[/:controller[/:action]]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Home\Controller\Index',
                        'action' => 'index'
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
        ),
        'invokables' => array(
        //--Mapper:
        //--Service:
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Home\Controller\Index' => 'Home\Controller\IndexController',
            'Home\Controller\Authentification' => 'Home\Controller\AuthentificationController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'home_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array ',
                'paths' => array(__DIR__ . '/../src/Home/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Home\Entity' => 'home_entities'
                )
            )
        ),
    ),
);

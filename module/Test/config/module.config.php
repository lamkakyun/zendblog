<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 7/13/2016
 * Time: 11:38 AM
 */

return array(
    'controllers'     => array(
        'invokables' => array(
            'Test\Controller\Index' => 'Test\Controller\IndexController',
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'router' => [
        'routes' => [
            'test' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'       => '/test[/:controller[/:action]]',
                    'defaults'    => array(
                        '__NAMESPACE__' => 'Test\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                    'constraints' => [
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ),
            ),
        ],
    ],

);
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

    'console' => array(
        'router' => array(
            'routes' => array(
                'user-reset-password' => array(
                    'options' => array(
                        'route'    => 'user resetpassword [--verbose|-v] <userEmail>',
                        'defaults' => array(
                            'controller' => 'Test\Controller\Index',
                            'action'     => 'resetpassword'
                        )
                    )
                ),
                'prompt' => array(
                    'options' => array(
                        'route' => 'prompt [-v|--verbose] <userEmail> <name>',
                        'defaults' => array(
                            'controller' => 'Test\Controller\Index',
                            'action'     => 'prompt'
                        )
                    )
                )
            )
        )
    )

);
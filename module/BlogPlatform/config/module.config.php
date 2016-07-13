<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 16-7-13
 * Time: 上午12:16
 */

return array(
    'view_manager'    => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'controllers'     => array(
        'invokables' => array(
            'BlogPlatform\Controller\Index' => 'BlogPlatform\Controller\IndexController',
        ),

        'factories'  => array(
//            'BlogPlatform\Controller\Index' => 'BlogPlatform\Factory\IndexControllerFactory',
        ),
    ),

    'router'          => [
        'routes' => [
            'index'     => [
                'type'          => 'literal',
                'options'       => [
                    'route'    => '/BlogPlatform',
                    'defaults' => array(
                        'controller' => 'BlogPlatform\Controller\Index', // 这个list 是 上面的controllers的配置
                        'action'     => 'index',
                    ),
                ],
                'may_terminate' => true,
                'child_routes'  => array(
                    'detail' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'       => '/:id',
                            'defaults'    => array(
                                'action' => 'detail',
                            ),
                            'constraints' => array(
                                'id' => '\d+',
                            ),
                        ),
                    ),

                ),
            ],
        ],
    ],
);
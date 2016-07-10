<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 16-7-10
 * Time: 下午7:29
 */

return [
    'controllers'     => array(
        'invokables' => array(
            'Checklist\Controller\Task' => 'Checklist\Controller\TaskController',
        ),

    ),

    'view_manager'    => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),


//    'router' => array(
//        'routes' => array(
//            'checklist' => array(
//                'type'    => 'Literal',
//                'options' => array(
//                    'route'    => '/task',
//                    'defaults' => array(
//                        '__NAMESPACE__' => 'Checklist\Controller',
//                        'controller'    => 'Task',
//                        'action'        => 'index',
//                    ),
//                ),
//                'may_terminate' => true,
//                'child_routes' => array(
//                    'default' => array(
//                        'type'    => 'Segment',
//                        'options' => array(
//                            'route'    => '/[:controller[/:action]]',
//                        ),
//                    ),
//                ),
//            ),
//        ),
//    ),

    'router' => array(
        'routes' => array(
            'task' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/task[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Checklist\Controller',
                        'controller'    => 'Task',
                        'action'        => 'index',
                    ),
                    'constraints' => array(
                        'action' => '(add|edit|delete)',
                        'id'     => '[0-9]+',
                    ),
                ),
            ),
        ),
    ),
];
<?php

return [

    'controllers'     => array(
        'invokables' => array(
//            'Blog\Controller\List' => 'Blog\Controller\ListController',
            'Blog\Controller\Test' => 'Blog\Controller\TestController',
        ),

        // 通过工厂模式创建控制器，所以我们应该编写 工厂
        'factories'  => array(
            'Blog\Controller\List'  => 'Blog\Factory\ListControllerFactory',
            'Blog\Controller\Write' => 'Blog\Factory\WriteControllerFactory',
            'Blog\Controller\Delete' => 'Blog\Factory\DeleteControllerFactory',
        ),
    ),

    // Registering Services
    // 如果不注册服务， serviceLocator 将找不到service
    'service_manager' => array(
//        'invokables' => array(
//            'Blog\Service\PostServiceInterface' => 'Blog\Service\PostService'
//        )

        // 通过工厂模式创建service，所以我们应该编写 工厂
        'factories' => [
            'Blog\Service\PostServiceInterface' => 'Blog\Factory\PostServiceFactory',
            'Zend\Db\Adapter\Adapter'           => 'Zend\Db\Adapter\AdapterServiceFactory',
            'Blog\Mapper\PostMapperInterface'   => 'Blog\Factory\ZendDbSqlMapperFactory',
        ],
    ),


    // iteral route is one that matches a specific string
    // segmented route is used for whenever your url is supposed to contain variable parameters
    'router'          => [
        'routes' => [

            // http://zendblog.test.com/blog
            'blog'     => [ // post 是文章的意思
                'type'          => 'literal', // Define the routes type to be "Zend\Mvc\Router\Http\Literal", which is basically just a string
                'options'       => [
                    'route'    => '/blog',
                    'defaults' => array(
                        'controller' => 'Blog\Controller\List', // 这个list 是 上面的controllers的配置
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

                    // http://zendblog.test.com/blog/add
                    'add'    => array(
                        'type'    => 'literal',
                        'options' => array(
                            'route'    => '/add',
                            'defaults' => array(
                                'controller' => 'Blog\Controller\Write',
                                'action'     => 'add',
                            ),
                        ),
                    ),

                    'edit'   => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'       => '/edit/:id',
                            'defaults'    => array(
                                'controller' => 'Blog\Controller\Write',
                                'action'     => 'edit',
                            ),
                            'constraints' => array(
                                'id' => '\d+',
                            ),
                        ),
                    ),

                    'delete' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'       => '/delete/:id',
                            'defaults'    => array(
                                'controller' => 'Blog\Controller\Delete',
                                'action'     => 'delete',
                            ),
                            'constraints' => array(
                                'id' => '\d+',
                            ),
                        ),
                    ),
                ),
            ],


//            A practical example for our Blog Module
//            'blog' => array(
//                'type' => 'literal',
//                'options' => array(
//                    'route'    => '/blog',
//                    'defaults' => array(
//                        'controller' => 'Blog\Controller\List',
//                        'action'     => 'index',
//                    ),
//                ),
//                'may_terminate' => true,
//                'child_routes'  => array(
//                    'detail' => array(
//                        'type' => 'segment',
//                        'options' => array(
//                            'route'    => '/:id',
//                            'defaults' => array(
//                                'action' => 'detail'
//                            ),
//                            'constraints' => array(
//                                'id' => '[1-9]\d*'
//                            )
//                        )
//                    )
//                )
//            ),

            // http://zendblog.test.com/about-me
            'about'    => array(
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/about-me',
                    'defaults' => array(
                        'controller' => 'AboutMeController',
                        'action'     => 'aboutme',
                    ),
                ),
            ),


            // http://zendblog.test.com/news/archive/2016
            'archives' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'       => '/news/archive/:year',
                    'defaults'    => array(
                        'controller' => 'ArchiveController',
                        'action'     => 'byYear',
//                        'year'       => date('Y') // defaults for the parameter year
                    ),
                    'constraints' => array(
                        'year' => '\d{4}',
                    ),
                ),
            ),

            // Generic routes 通用路由 (前面的路由不再可用, 包括其他模块)
            // http://zendblog.test.com/list
    //            'default' => array(
    //                'type' => 'segment',
    //                'options' => array(
    //                    'route'    => '/[:controller[/:action]]',
    //                    'defaults' => array(
    //                        '__NAMESPACE__' => 'Blog\Controller',
    //                        'controller'    => 'Blog',
    //                        'action'        => 'index',
    //                    ),
    //                    'constraints' => [
    //                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
    //                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
    //                    ]
    //                ),
    //            )


            // Using child_routes for more structure
//            /news
//            /news/archive
//            /news/archive/2014
//            /news/42
            'news'     => array(
                'type'          => 'literal',
                'options'       => array(
                    'route'    => '/news',
                    'defaults' => array(
                        'controller' => 'NewsController',
                        'action'     => 'showAll',
                    ),
                ),
                // Defines that "/news" can be matched on its own without a child route being matched
                'may_terminate' => true,
                'child_routes'  => array(
                    'archive' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'       => '/archive[/:year]',
                            'defaults'    => array(
                                'action' => 'archive',
                            ),
                            'constraints' => array(
                                'year' => '\d{4}',
                            ),
                        ),
                    ),
                    'single'  => array(
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
            ),
        ],
    ],

    // 指定试图文件目录
    'view_manager'    => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),


    // 不使用global 的 数据库配置，自定义模块的DB配置
    'db'              => array(
        'driver'         => 'Pdo',
        'username'       => 'jet',  //edit this
        'password'       => '123',  //edit this
        'dsn'            => 'mysql:dbname=test;host=127.0.0.1',
        'driver_options' => array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
        ),
    ),
];
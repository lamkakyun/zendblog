<?php

return array(
    /**
     * The controllers section provides a list of all the controllers provided by the module.
     */
    'controllers' => array(
         'invokables' => array(
             'Album\Controller\Album' => 'Album\Controller\AlbumController',
         ),
     ),

    /**
     * This will allow it to find the view scripts for the Album module that are stored in our view/ directory
     */
    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),


    // The mapping of a URL to a particular action(定义路由)
    /**
        /album	Home (list of albums)	index
        /album/add	Add new album	add
        /album/edit/2	Edit album with an id of 2	edit
        /album/delete/4	Delete album with an id of 4	delete
     */
    'router' => array(
        'routes' => array(
            'album' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/album[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Album\Controller\Album',
                        'action'     => 'index',
                    ),
                ),
            )
        )
    )
);
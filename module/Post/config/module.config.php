<?php

namespace Post;

return array(
    'router' => array(
        'routes' => array(
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Post\Controller\Post',
                        'action' => 'index',
                    ),
                ),
            ),
            'generic-route' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/[:controller[/:action]][/page/:page][/offset/:offset][/]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'page' => '[0-9]',
                        'offset' => '[0-9]',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Post\Controller',
                        'controller' => 'Post',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Post\Controller\Post' => 'Post\Controller\PostController'
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'post/post/index' => __DIR__.'/../view/post/post/index.twig',
        ),
        'template_path_stack' => array(
            __DIR__.'/../view',
        ),
    ),
);

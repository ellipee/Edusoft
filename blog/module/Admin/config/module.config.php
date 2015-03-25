<?php
namespace Admin;
 

return array(
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Academicsession' => 'Admin\Controller\AcademicsessionController',
            'Admin\Controller\Session' => 'Admin\Controller\SessionController',
            'Admin\Controller\Section' => 'Admin\Controller\SectionController',
            'Admin\Controller\Subject' => 'Admin\Controller\SubjectController',
            'Admin\Controller\Class' => 'Admin\Controller\ClassController',           
            
        ),
    ),
    'router' => array(
        'routes' => array(
            'admin' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/admin',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Admin\Controller',
                        'controller'    => 'Session',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' =>array(
            'adminlayout/layout'=>__DIR__. '/../view/layout/adminlayout.phtml',
            ),
        'template_path_stack' => array(
            'admin' => __DIR__ . '/../view'
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
        
        'display_exceptions' => true,
    ),
  
  );
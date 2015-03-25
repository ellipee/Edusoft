<?php
// http://stackoverflow.com/questions/13007477/doctrine-2-and-zf2-integration
namespace Students; // SUPER important for Doctrine othervise can not find the Entities

return array(
	'controllers' => array(
        'invokables' => array(
            'Students\Controller\Student' => 'Students\Controller\StudentController',
      
          			
        ),
    ),	
    'router' => array(
        'routes' => array(
        	'student' => array(
				'type'    => 'Literal',
				'options' => array(
					'route'    => '/student',
					'defaults' => array(
						'__NAMESPACE__' => 'Students\Controller',
						'controller'    => 'student',
						'action'        => 'dashboard',
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
    	'template_map' => array(
            'students/layout' => __DIR__ . '/../view/layout/studentlayout.phtml',
            
          ),
        'template_path_stack' => array(
            'students' => __DIR__ . '/../view'
            ),
		
		'display_exceptions' => true,
    ),
	
);
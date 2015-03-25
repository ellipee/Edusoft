<?php
// http://stackoverflow.com/questions/13007477/doctrine-2-and-zf2-integration
namespace Teachers; // SUPER important for Doctrine othervise can not find the Entities

return array(
	'controllers' => array(
        'invokables' => array(
            'Teachers\Controller\Teacher' => 'Teachers\Controller\TeacherController',
      
          			
        ),
    ),	
    'router' => array(
        'routes' => array(
        	'teacher' => array(
				'type'    => 'Literal',
				'options' => array(
					'route'    => '/teacher',
					'defaults' => array(
						'__NAMESPACE__' => 'Teachers\Controller',
						'controller'    => 'Teacher',
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
            'teachers/layout' => __DIR__ . '/../view/layout/teacherlayout.phtml',
            
          ),
        'template_path_stack' => array(
            'teachers' => __DIR__ . '/../view'
            ),
		
		'display_exceptions' => true,
    ),
	
);
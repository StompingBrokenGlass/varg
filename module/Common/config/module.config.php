<?php
return array(
	'controllers' => array(
        'invokables' => array(
        ),
        'factories' => array(
        )
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

);

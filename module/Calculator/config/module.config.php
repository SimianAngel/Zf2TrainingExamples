<?php
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/calculator[/:action]',
                    'defaults' => array(
                        'controller' => 'StringCalculator',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'StringCalculator' => 'Calculator\Controller\StringCalculatorController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        )
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
                'consolecalculator' => array(
                    'options' => array(
                        'route' => 'console math <firstNumber> <operator> <secondNumber>',
                        'defaults' => array(
                            'controller' => 'StringCalculator',
                            'action' => 'consolecalculate'
                        ),
                    ),
                ),
            ),
        ),
    ),
);
<?php

use Quasar\Di\Lifecycle\WillUse;

/*
 * This is not supposed to be edited. Use common.php 
 * or enviornment specific configuration files.
 */
return array(
        
    // dispatcher configuration
    'Quasar\Dispatcher\Dispatcher' => array(
        'alias' => 'dispatcher',
        'instances' => array(
            'Quasar\Broker\HelperBroker' => array(
                'params' => array(
                    'namespaces' => array(
                        'Quasar\Controller\Helper'
                    )
                )
            )
        )
    ),
    
    // response object configuration
    'Quasar\Dispatcher\Response\Response' => array(
        'params' => array(
            'decorators' => array(
                'httpHeaders' => array(
                    'headers' => array(
                        'Content-Type: text/html'
                    )
                ),
                'renderer', 
                'layout' => array(
                    'params' => array(
                        'title' => 'La Rocca - Дневник на брокера'
                    )
                )
            ),
            'instructions' => array('_layout' => 'layout')
        )
    ),
        
    // standart view renderer configuration
    'Quasar\View\Renderer\Renderer' => array(
        'params' => array(
            'paths' => array(
                ROOT_PATH . '/src/App/View/templates/'
            )
        ),
        'instances' => array(
            'Quasar\Broker\HelperBroker' => array(
                'params' => array(
                    'namespaces' => array(
                        'Quasar\View\Helper',
                        'App\View\Helper'
                    )
                )
            )
        )
    ),

    // DBAL configuration
    'Doctrine\DBAL\Connection' => array(
        'alias' => 'db-driver',
        'params' => array(
            'params' => array(),
            'driver' => new WillUse('Doctrine\DBAL\Driver\PDOMySql\Driver'),
        ),
        'shared' => true
    )
);
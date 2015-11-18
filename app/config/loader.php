<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */

$loader->registerNamespaces(array(
        'Ajax' => __DIR__ . '/../../vendor/jcheron/phalcon-jquery/Ajax/',
		'Library' => __DIR__ . '/../library/'
));

$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir,
    		__DIR__ . "/../library/",
    )
)->register();
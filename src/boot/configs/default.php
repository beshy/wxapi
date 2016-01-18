<?php

return array(
    // View settings
    'view' => [
        'template_dir' => SRC_ROOT . '/view',
        'compile_dir' => SRC_ROOT . '/../tmp/templates_compile',
        'cache_dir' =>  SRC_ROOT . '/../tmp/templates_cache',
    ],

    // monolog settings
    'logger' => [
        'name' => 'app',
        'path' => SRC_ROOT . '/../tmp/app.log',
        'level' => \Monolog\Logger::DEBUG, // \Monolog\Logger::DEBUG>INFO>NOTICE>WARNING>ERROR>CRITICAL>ALERT>EMERGENCY
    ],

);

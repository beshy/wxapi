<?php

date_default_timezone_set('PRC');
define('SRC_ROOT', dirname(__DIR__));

if (!defined('APP_ENV')) {
    define('APP_ENV', 'local');
}

define('APP_DEBUG', (APP_ENV == 'rd' || APP_ENV == 'local')? true: false );

if (APP_DEBUG) {
    ini_set('display_errors', 'On');
}

require SRC_ROOT . '/vendor/autoload.php';
session_start();



use \App\GApp as App;


// Instantiate the app
$app = new App([
    'settings' => [
        'determineRouteBeforeAppMiddleware' => true,
        'displayErrorDetails' => APP_DEBUG
    ]
]);
App::setInstance($app);
$container = $app->getContainer();

// Set up dependencies
require SRC_ROOT . '/boot/services/main.php';

// Register middleware
require SRC_ROOT . '/boot/middlewares/main.php';

// Register routes
require SRC_ROOT . '/boot/routes/main.php';


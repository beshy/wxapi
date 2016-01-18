<?php
// HOME PAGE
// $app->map(['GET'], '/', function ($req, $res, $args) use ($app) {
//     $this->view->display('home.tpl');
// });

$app->map(['GET'], '/', "App\Controller\Wxapi\Wxapi:valid");

$app->map(['POST'], '/', "App\Controller\Wxapi\Wxapi:parse");

// TEST
$app->map(['GET'], '/test', function ($req, $res, $args) use ($app) {
    $this->logger->alert('test access');
    $this->view->display('test.tpl');
});


<?php

// Config
$container['config'] = function ($c) {
    $config = new \Noodlehaus\Config([
        SRC_ROOT . '/boot/configs/',
        SRC_ROOT . '/boot/configs/' . APP_ENV . "/",
    ]);

    return $config;
};

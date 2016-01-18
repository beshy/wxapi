<?php

namespace App;

class GApp extends \Slim\App
{
    private static $app;

    public static function setInstance(\Slim\App $app)
    {
        if (!self::$app) {
            self::$app = $app;
        }
    }

    public static function getInstance()
    {
        return self::$app;
    }

    // Get Global key-object or key-value
    public static function getG($key)
    {
        if (!self::$app) {
            throw new \Exception('Expected Set Slim App to GApp');
        }
        $c = self::$app->getContainer();

        return $c->has($key) ? $c->get($key) : null;
    }

    // Set Global key-object or key-value
    public static function setG($key, $value)
    {
        if (!self::$app) {
            throw new \Exception('Expected Set Slim App to GApp');
        }
        $c = self::$app->getContainer();

        if ($c->has($key)) {
            return false;
        }

        $c[$key] = $value;
        return true;
    }

}

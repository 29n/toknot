<?php

/**
 * Toknot (http://toknot.com)
 *
 * @copyright  Copyright (c) 2011 - 2013 Toknot.com
 * @license    http://toknot.com/LICENSE.txt New BSD License
 * @link       https://github.com/chopins/toknot
 */

use Toknot\Control\Application;
use Toknot\Control\Router;

include_once __DIR__ . '/Core/Application.php';

function main($namespace, $path) {
    $app = new Application;

    $app->setRouterArgs(Router::ROUTER_PATH, 2);
    $app->run($namespace, $path);
    return $app;
}

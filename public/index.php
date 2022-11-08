<?php
declare(strict_types=1);
use Phalcon\Di\FactoryDefault;
use Phalcon\Loader;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Dispatcher;
error_reporting(E_ALL);
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
$loader = new Loader();
$loader->registerNamespaces(
    [
        'App\Controllers' =>APP_PATH .'/controllers/',
        'App\Models'      =>APP_PATH. '/models/', 
        'App\Library'     =>APP_PATH.'/library/',
    ]
);
$loader->register();
$di = new FactoryDefault();
include APP_PATH . '/config/services.php';
include APP_PATH . '/config/router.php';
$config = $di->getConfig();
$di->set(
    'dispatcher',
    function () {
        $dispatcher = new Dispatcher();
        $dispatcher->setDefaultNamespace(
            'App\Controllers'
        );
        return $dispatcher;
    }
);
$application = new Application($di);
try {
    $response = $application->handle($_SERVER["REQUEST_URI"]);
    $response->send();
    //echo $application->handle($_SERVER['REQUEST_URI'])->getContent();
} catch (\Exception $e) {
    echo $e->getMessage();
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}

/*
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Router;

$di = new FactoryDefault();

$di->set(
    'router',
    function () {
        $router = new Router();
        $router->setDefaultModule('front');
        $router->removeExtraSlashes(true);
        return $router;
    }
);

$application = new Application($di);

$application->registerModules(
    [
        'front' => [
            'className' => 'Multi\Front\Module',
            'path'      => '../site/front/Module.php',
        ]
    ]
);

try {
    $response = $application->handle(
        $_SERVER["REQUEST_URI"]
    );
    $response->send();
} catch (\Exception $e) {
    echo $e->getMessage();
}
*/

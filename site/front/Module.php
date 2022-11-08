<?php

namespace Multi\Front;

use Phalcon\Loader;
use Phalcon\Di\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View;
use Phalcon\Escaper;
use Phalcon\Flash\Direct as Flash;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Session\Adapter\Stream as SessionAdapter;
use Phalcon\Session\Manager as SessionManager;
use Phalcon\Url as UrlResolver;
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $container = null)
    {
        $loader = new Loader();
        $loader->registerNamespaces(
            [
                'front\controllers' => '../../site/front/controllers/',
                'front\models'      => '../../site/front/models/', 
            ]
        );
        $loader->register();
    }
    
    public function registerServices(DiInterface $di)
    {
        $di->set(
            'dispatcher',
            function () {
                $dispatcher = new Dispatcher();
                $dispatcher->setDefaultNamespace('front\Controllers');
                return $dispatcher;
            }
        );
        /*
        // Registering the view component
        $di->set(
            'view',
            function () {
                $view = new View();
                $view->setViewsDir(
                    '../site/front/views/'
                );
                return $view;
            }
        ); */
        $di->setShared('config', function () {
            return include "../app/config/config.php";
        });
        $di->setShared('url', function () {
            $config = $this->getConfig();
            $url = new UrlResolver();
            $url->setBaseUri('/');
            return $url;
        });
        $di->setShared('view', function () {
            $config = $this->getConfig();
            $view = new View();
            $view->setDI($this);
            $view->setViewsDir("../site/front/views/");
            $view->registerEngines([
                '.volt' => function ($view) {
                    $config = $this->getConfig();
                    $volt = new VoltEngine($view, $this);
                    $volt->setOptions([
                        'path' => $config->application->cacheDir,
                        'separator' => '_'
                    ]);
                return $volt;
                },
                '.phtml' => PhpEngine::class
            ]);
            return $view;
        });
        $di->setShared('db', function () {
            $config = $this->getConfig();
            $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
            $params = [
                'host'     => $config->database->host,
                'username' => $config->database->username,
                'password' => $config->database->password,
                'dbname'   => $config->database->dbname,
                'charset'  => $config->database->charset
            ];
            if ($config->database->adapter == 'Postgresql') {
                unset($params['charset']);
            }
            return new $class($params);
        });
        $di->setShared('modelsMetadata', function () {
            return new MetaDataAdapter();
        });
        $di->set('flash', function () {
            $escaper = new Escaper();
            $flash = new Flash($escaper);
            $flash->setImplicitFlush(false);
            $flash->setCssClasses([
                'error'   => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice'  => 'alert alert-info',
                'warning' => 'alert alert-warning'
            ]);
            return $flash;
        });
        $di->setShared('session', function () {
            $session = new SessionManager();
            $files = new SessionAdapter([
                'savePath' => sys_get_temp_dir(),
            ]);
            $session->setAdapter($files);
            $session->start();
            return $session;
        });
    }
}
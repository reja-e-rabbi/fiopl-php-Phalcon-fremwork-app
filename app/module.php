<?php

namespace Multi\Front;

use Phalcon\Loader;
use Phalcon\Di\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View;

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
    
    public function registerServices(DiInterface $container)
    {
        // Registering a dispatcher
        $container->set(
            'dispatcher',
            function () {
                $dispatcher = new Dispatcher();
                $dispatcher->setDefaultNamespace('front\\Controllers');
                return $dispatcher;
            }
        );
        // Registering the view component
        $container->set(
            'view',
            function () {
                $view = new View();
                $view->setViewsDir(
                    '../../site/front/views/'
                );
                return $view;
            }
        );
    }
}
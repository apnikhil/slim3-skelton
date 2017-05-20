<?php namespace App;

use DI\ContainerBuilder;
use Interop\Container\ContainerInterface;

class App extends \DI\Bridge\Slim\App
{
    protected function configureContainer(ContainerBuilder $builder)
    {
        $definitions = [
            'settings.displayErrorDetails' => true,

            /**
             * Views
             */
            \Slim\Views\Twig::class => function (ContainerInterface $container) {
                $view = new \Slim\Views\Twig(__DIR__ . '/../templates', [
                    'cache' => false,
                    'debug' => true
                ]);
                $view->addExtension(new \Twig_Extension_Debug());
                $view->addExtension(new \Slim\Views\TwigExtension(
                    $container->get('router'),
                    $container->get('request')->getUri()
                ));
                return $view;
            }
            /**
             * Add more definitions
             */

        ];
        $builder->addDefinitions($definitions);
    }
}
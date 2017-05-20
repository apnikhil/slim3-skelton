<?php namespace App\Controllers;

use Slim\Views\Twig as View;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Interop\Container\ContainerInterface;
use App\Repository\AppRepo;

class AppController
{

    public function __construct(ContainerInterface $ci)
    {
        // Config...
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param View $view
     */
    public function index(Request $request, Response $response, View $view)
    {
        try {
            $helloWorld = AppRepo::helloWorld();
            return $view->render($response, 'app/index.twig',
                array(
                    'helloWorld' => $helloWorld
                )
            );

        } catch (\Exception $e) {
            // Exception handling
        }
    }
}

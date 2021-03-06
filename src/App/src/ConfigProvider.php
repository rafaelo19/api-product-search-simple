<?php

declare(strict_types=1);

namespace App;

use App\Handler\GetProductHandler;
use App\Handler\GetProductHandlerFactory;
use App\Handler\HomePageHandler;
use App\Handler\HomePageHandlerFactory;
use App\Middleware\ValidationProductMiddleware;
use App\Middleware\ValidationProductMiddlewareFactory;
use App\Service\GetProductService;
use App\Service\GetProductServiceFactory;
use App\Service\ValidationProductService;
use App\Service\ValidationProductServiceFactory;
use App\Util\Serializer;
use App\Util\SerializerFactory;
use Doctrine\ORM\EntityManager;
use Mezzio\Application;
use Roave\PsrContainerDoctrine\EntityManagerFactory;

/**
 * The configuration provider for the App module
 *
 * @see https://docs.laminas.dev/laminas-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies(): array
    {
        return [
            'invokables' => [],
            'delegators' => [
                Application::class => [RoutesDelegator::class]
            ],
            'factories'  => [
                EntityManager::class => EntityManagerFactory::class,

                #Middleware
                ValidationProductMiddleware::class => ValidationProductMiddlewareFactory::class,

                #Handler
                HomePageHandler::class => HomePageHandlerFactory::class,
                GetProductHandler::class => GetProductHandlerFactory::class,

                #Service
                GetProductService::class => GetProductServiceFactory::class,
                ValidationProductService::class => ValidationProductServiceFactory::class,

                #Util
                Serializer::class => SerializerFactory::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates(): array
    {
        return [
            'paths' => [
                'app'    => [__DIR__ . '/../templates/app'],
                'error'  => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
            ],
        ];
    }
}

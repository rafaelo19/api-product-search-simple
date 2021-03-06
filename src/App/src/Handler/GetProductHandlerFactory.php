<?php

declare(strict_types=1);

namespace App\Handler;

use App\Service\GetProductService;
use Psr\Container\ContainerInterface;

class GetProductHandlerFactory
{
    public function __invoke(ContainerInterface $container): GetProductHandler
    {
        $getProductService = $container->get(GetProductService::class);
        return new GetProductHandler($getProductService);
    }
}

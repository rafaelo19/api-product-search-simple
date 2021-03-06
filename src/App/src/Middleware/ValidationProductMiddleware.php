<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Service\ValidationProductService;
use App\Util\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ValidationProductMiddleware implements MiddlewareInterface
{
    /**
     * @var ValidationProductService
     */
    private $validationProductService;

    public function __construct(ValidationProductService $validationProductService)
    {
        $this->validationProductService = $validationProductService;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        try {
            $id = intval($request->getAttribute("id"));
            $this->validationProductService->validationProductExist($id);
            return $handler->handle($request);
        } catch (\Exception $e) {
            return new Response(["erro" => $e->getMessage()], $e->getCode() ?? 500);
        }
    }
}

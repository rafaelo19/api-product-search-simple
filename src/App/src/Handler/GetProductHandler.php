<?php

declare(strict_types=1);

namespace App\Handler;

use App\Service\GetProductService;
use App\Util\Response;
USE App\Dto\Response as ResponseDto;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Exception;

class GetProductHandler implements RequestHandlerInterface
{
    /**
     * @var
     */
    private $getProductService;

    public function __construct(GetProductService $getProductService)
    {
        $this->getProductService = $getProductService;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $productId = intval($request->getAttribute("id"));
            $res = new ResponseDto();
            $res->setData($this->getProductService->getByIdSql($productId));
            return new Response($res, 200);
        } catch (Exception $e) {
            return new Response(["erro" => $e->getMessage()], 200);
        }

    }
}

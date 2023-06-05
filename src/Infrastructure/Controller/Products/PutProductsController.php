<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Products;

use App\Application\Bus\Query\QueryBus;
use App\Application\Products\Query\ProductsQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PutProductsController
{
    public function __construct(private readonly QueryBus $queryBus)
    {
    }

    #[Route("/products", methods: [Request::METHOD_GET])]
    public function __invoke(Request $request): JsonResponse
    {
        $result = $this->queryBus->query(
            new ProductsQuery($request->query->get('name'))
        );

        return new JsonResponse(status: Response::HTTP_OK);
    }
}

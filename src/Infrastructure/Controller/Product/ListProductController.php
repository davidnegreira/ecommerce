<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Product;

use App\Application\Bus\Query\QueryBus;
use App\Application\Product\Query\ListProductQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ListProductController
{
    public function __construct(private readonly QueryBus $queryBus)
    {
    }

    #[Route("/api/v1/product", methods: [Request::METHOD_GET])]
    public function __invoke(Request $request): JsonResponse
    {
        $result = $this->queryBus->query(
            new ListProductQuery(
                $request->query->get('name'),
                (int)$request->query->get('page')
            ),
        );

        return new JsonResponse($result);
    }
}

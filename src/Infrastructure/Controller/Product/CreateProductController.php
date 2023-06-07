<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Product;

use App\Application\Bus\Command\CommandBus;
use App\Application\Product\Command\CreateProductCommand;
use JsonException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CreateProductController
{
    public function __construct(private readonly CommandBus $commandBus)
    {
    }

    /**
     * @throws JsonException
     */
    #[Route("/api/v1/product", methods: [Request::METHOD_POST])]
    public function __invoke(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $this->commandBus->handle(new CreateProductCommand(
            $data['productId'],
            $data['name'],
            $data['description'],
            (int)$data['tax'],
            (float)$data['price'],
        ));

        return new JsonResponse(status:Response::HTTP_CREATED);
    }
}

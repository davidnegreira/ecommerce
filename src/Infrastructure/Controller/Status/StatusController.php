<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Status;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatusController
{
    #[Route("/statu", methods: [Request::METHOD_GET])]
    public function status(): JsonResponse
    {
        return new JsonResponse(status: Response::HTTP_OK);
    }
}
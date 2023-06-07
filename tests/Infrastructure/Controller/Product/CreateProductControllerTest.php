<?php

namespace App\Tests\Infrastructure\Controller\Product;

use App\Application\Bus\Command\CommandBus;
use App\Infrastructure\Controller\Product\CreateProductController;
use JsonException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateProductControllerTest extends TestCase
{
    private const CONTENT = '{
        "productId": "3810d26a-0cba-437a-9f83-a7358543944a",
        "name": "name product created",
        "description": "description created",
        "tax": 10,
        "price": 12.12
    }';

    private CommandBus|MockObject $commandBus;
    private CreateProductController $controller;

    protected function setUp(): void
    {
        $this->commandBus = $this->createMock(CommandBus::class);
        $this->controller = new CreateProductController($this->commandBus);
    }

    /**
     * @throws JsonException
     */
    public function testGivenValidRequestMustResponseCreatedProducts(): void
    {
        $this->commandBus->expects(self::once())->method('handle');

        $response = $this->controller->__invoke(new Request(content: self::CONTENT));
        self::assertSame($response->getStatusCode(), Response::HTTP_CREATED);
    }
}

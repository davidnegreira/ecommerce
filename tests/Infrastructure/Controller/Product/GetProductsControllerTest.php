<?php

namespace App\Tests\Infrastructure\Controller\Product;

use App\Application\Bus\Query\QueryBus;
use App\Application\Product\Query\ProductQuery;
use App\Infrastructure\Controller\Product\GetProductController;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetProductsControllerTest extends TestCase
{
    private GetProductController $controller;
    private QueryBus|MockObject $queryBus;

    protected function setUp(): void
    {
        $this->queryBus = $this->createMock(QueryBus::class);
        $this->controller = new GetProductController($this->queryBus);
    }

    public function testMustResponseOkWhenFoundProducts(): void
    {
        $this->queryBus->expects(self::once())
            ->method('query')
            ->with(new ProductQuery('test'));

        $response = $this->controller->__invoke(new Request(query: ['name' => 'test']));

        self::assertSame($response->getStatusCode(), Response::HTTP_OK);
    }
}

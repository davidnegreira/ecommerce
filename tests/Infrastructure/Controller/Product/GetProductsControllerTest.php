<?php

namespace App\Tests\Infrastructure\Controller\Product;

use App\Application\Bus\Query\QueryBus;
use App\Application\Product\Query\ListProductQuery;
use App\Infrastructure\Controller\Product\ListProductController;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetProductsControllerTest extends TestCase
{
    private ListProductController $controller;
    private QueryBus|MockObject $queryBus;

    protected function setUp(): void
    {
        $this->queryBus = $this->createMock(QueryBus::class);
        $this->controller = new ListProductController($this->queryBus);
    }

    public function testMustResponseOkWhenFoundProducts(): void
    {
        $this->queryBus->expects(self::once())
            ->method('query')
            ->with(new ListProductQuery('test', 1));

        $response = $this->controller->__invoke(new Request(query: ['name' => 'test', 'page' => 1]));

        self::assertSame($response->getStatusCode(), Response::HTTP_OK);
    }
}

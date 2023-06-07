<?php

namespace App\Tests\Application\Product\Query;

use App\Application\Product\Query\ProductQuery;
use App\Application\Product\Query\ProductQueryHandler;
use App\Domain\Product\ProductRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ProductsQueryHandlerTest extends TestCase
{

    private ProductQueryHandler $handler;
    private ProductRepository|MockObject $productsRepository;

    protected function setUp(): void
    {
        $this->productsRepository = $this->createMock(ProductRepository::class);
        $this->handler = new ProductQueryHandler($this->productsRepository);
    }

    public function testGivenQueryMustReturnAllResults(): void
    {
        $expectResult = [];
        $this->productsRepository->method('all')->willReturn($expectResult);

        $result = $this->handler->__invoke(new ProductQuery(null));

        self::assertSame($expectResult, $result);
    }
}

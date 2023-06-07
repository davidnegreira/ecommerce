<?php

namespace App\Tests\Application\Product\Query;

use App\Application\Product\Query\ListProductQuery;
use App\Application\Product\Query\ListProductQueryHandler;
use App\Domain\Product\Product;
use App\Domain\Product\ProductRepository;
use App\Tests\Domain\Product\ProductMother;
use App\Tests\Domain\Product\ProductRepositorySpy;
use PHPUnit\Framework\TestCase;

class ListProductQueryHandlerTest extends TestCase
{
    private ProductRepositorySpy $productsRepository;
    private ListProductQueryHandler $handler;

    protected function setUp(): void
    {
        $this->productsRepository = new ProductRepositorySpy();
        $this->handler = new ListProductQueryHandler($this->productsRepository);
    }

    public function testGivenQueryMustReturnAllResults(): void
    {
        $expectResult = [ProductMother::create(), ProductMother::create()];
        $this->productsRepository->addListOfResult(...$expectResult);

        $result = $this->execute();

        self::assertSame($expectResult, $result);
    }

    private function execute(): array
    {
        return $this->handler->__invoke(new ListProductQuery(null, 1));
    }
}

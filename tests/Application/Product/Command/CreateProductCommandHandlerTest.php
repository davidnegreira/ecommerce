<?php

namespace App\Tests\Application\Product\Command;

use App\Application\Product\Command\CreateProductCommand;
use App\Application\Product\Command\CreateProductCommandHandler;
use App\Domain\Product\NotValidTaxException;
use App\Tests\Domain\Product\ProductRepositorySpy;
use PHPUnit\Framework\TestCase;

class CreateProductCommandHandlerTest extends TestCase
{
    private ProductRepositorySpy $productRepository;
    private CreateProductCommandHandler $handler;

    protected function setUp(): void
    {
        $this->productRepository = new ProductRepositorySpy();
        $this->handler = new CreateProductCommandHandler($this->productRepository);
    }

    public function testGivenNotValidTaxMustFail(): void
    {
        $this->expectException(NotValidTaxException::class);
        $this->execute(11);
    }

    public function testGivenValidDataMustCreateProduct(): void
    {
        $this->execute(10);

        self::assertSame(
            '3810d26a-0cba-437a-9f83-a7358543944a',
            (string)$this->productRepository->getProduct()->productId,
        );
    }

    private function execute($tax): void
    {
        $this->handler->__invoke(
            new CreateProductCommand(
                '3810d26a-0cba-437a-9f83-a7358543944a',
                'name product created',
                'description created',
                $tax,
                12.12
            ),
        );
    }

}

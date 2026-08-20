<?php

namespace App\Modules\Product\Application\UseCases\Product;

use App\Modules\Product\Application\DTOs\CreateProductDTO;
use App\Modules\Product\Domain\Repositories\ProductRepositoryInterface;
use App\Modules\Product\Domain\Entities\Product;
use App\Modules\Product\Domain\ValueObjects\{
    Sku, Slug, Money, Dimension, Weight, Inventory, ProductStatus
};

class CreateProductUseCase
{
    public function __construct(
        private ProductRepositoryInterface $repository
    ) {}

    public function execute(CreateProductDTO $dto): Product
    {
        $product = new Product(
            id: null,
            sku: new Sku($dto->sku),
            groupId: $dto->groupId,
            categoryId: $dto->categoryId,
            themeId: $dto->themeId,
            woodTypeId: $dto->woodTypeId,
            finishId: $dto->finishId,
            artisanId: $dto->artisanId,
            status: new ProductStatus($dto->statusId),
            name: $dto->name,
            slug: $dto->slug ? new Slug($dto->slug) : null,
            description: $dto->description,
            price: new Money($dto->price),
            compareAtPrice: $dto->compareAtPrice ? new Money($dto->compareAtPrice) : null,
            dimension: new Dimension($dto->height, $dto->width, $dto->depth),
            weight: $dto->weight ? new Weight($dto->weight) : null,
            isUnique: $dto->isUnique,
            isHandmade: $dto->isHandmade,
            craftedYear: $dto->craftedYear,
            inventory: new Inventory($dto->quantity, $dto->reservedQuantity),
            leadTimeDays: $dto->leadTimeDays
        );

        $this->repository->save($product);

        return $product;
    }
}

<?php


namespace App\Repositories;


use App\DTO\ProductData;
use App\DTO\ProductSearchData;
use App\Models\Product;

class ProductRepository extends BaseRepository
{
    /**
     * @return Product
     */
    public function getModel(): Product
    {
        return Product::getModel();
    }

    /**
     * @param ProductData $dto
     * @return Product
     */
    public function create(ProductData $dto): Product
    {
        return $this->getModel()::create([
            'name' => $dto->getName(),
            'price' => $dto->getPrice()
        ]);
    }

    /**
     * @param Product $product
     * @param ProductData $dto
     */
    public function update(Product $product, ProductData $dto): void
    {
        $product->update([
            'name' => $dto->getName(),
            'price' => $dto->getPrice()
        ]);
    }

    /**
     * @param ProductSearchData $dto
     * @return Product | null
     */
    public function search(ProductSearchData $dto): ?Product
    {
        $name = $dto->getName();

        return $this->getModel()
            ->where('name', 'like', "%$name%")
            ->get();
    }
}

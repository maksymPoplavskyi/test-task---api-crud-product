<?php


namespace App\Services\Admin;


use App\DTO\ProductData;
use App\DTO\ProductSearchData;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\ProductSearchRequest;
use App\Models\Product;
use App\Repositories\CharacteristicRepository;
use App\Repositories\ProductCharacteristicsRepository;
use App\Repositories\ProductRepository;

class ProductService
{
    /** @var ProductRepository $productRepository */
    private $productRepository;
    /** @var  ProductCharacteristicsRepository $productCharacteristicsRepository */
    private $productCharacteristicsRepository;
    /** @var CharacteristicRepository $characteristicRepository */
    private $characteristicRepository;

    /**
     * ProductService constructor.
     * @param ProductRepository $productRepository
     * @param ProductCharacteristicsRepository $productCharacteristicsRepository
     * @param CharacteristicRepository $characteristicRepository
     */
    public function __construct(ProductRepository $productRepository,
                                ProductCharacteristicsRepository $productCharacteristicsRepository,
                                CharacteristicRepository $characteristicRepository)
    {
        $this->productRepository = $productRepository;
        $this->productCharacteristicsRepository = $productCharacteristicsRepository;
        $this->characteristicRepository = $characteristicRepository;
    }

    /**
     * @param ProductRequest $request
     * @return Product
     */
    public function create(ProductRequest $request)
    {
        $dto = new ProductData($request);
        $product = $this->productRepository->create($dto); // new created product

        $characteristics = array_slice($request->validated(), 2);
        $this->productCharacteristicsRepository->create($product->id, $characteristics, $this->characteristicRepository);

        return $product;
    }

    /**
     * @param Product $product
     * @param ProductRequest $request
     * @return Product
     */
    public function update(Product $product, ProductRequest $request)
    {
        $dto = new ProductData($request);
        $this->productRepository->update($product, $dto);

        $characteristics = array_slice($request->validated(), 2);
        $this->productCharacteristicsRepository->update($product->id, $characteristics, $this->characteristicRepository);

        return $product;
    }

    /**
     * @param ProductSearchRequest $request
     * @return Product | null Products
     */
    public function search(ProductSearchRequest $request)
    {
        $dto = new ProductSearchData($request);

        return $this->productRepository->search($dto);
    }
}

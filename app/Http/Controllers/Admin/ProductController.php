<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\ProductSearchRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\Admin\ProductService;
use Exception;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /** @var ProductRepository $productRepository */
    private $productRepository;
    /** @var ProductService $productService */
    private $productService;

    /**
     * ProductController constructor.
     * @param ProductRepository $productRepository
     * @param ProductService $productService
     */
    public function __construct(ProductRepository $productRepository, ProductService $productService)
    {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
    }

    /**
     * @return JsonResponse Products
     */
    public function index()
    {
        return response()->json($this->productRepository->getAll());
    }

    /**
     * @param ProductRequest $request
     * @return JsonResponse Product
     */
    public function create(ProductRequest $request)
    {
        return response()->json(($this->productService->create($request)));
    }

    /**
     * @param Product $product
     * @return JsonResponse Products
     * @throws Exception
     */
    public function delete(Product $product)
    {
        $product->delete();
        return response()->json($this->productRepository->getAll());
    }

    /**
     * @param Product $product
     * @param ProductRequest $request
     * @return JsonResponse Product
     */
    public function update(Product $product, ProductRequest $request)
    {
        return response()->json(($this->productService->update($product, $request)));
    }

    /**
     * @param ProductSearchRequest $request
     */
    public function search(ProductSearchRequest $request)
    {
        $this->productService->search($request);
    }
}

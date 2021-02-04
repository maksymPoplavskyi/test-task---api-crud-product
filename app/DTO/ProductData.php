<?php


namespace App\DTO;


use App\Http\Requests\Admin\ProductRequest;

class ProductData
{
    /** @var string $name */
    private $name;
    /** @var float $price */
    private $price;

    /**
     * ProductData constructor.
     * @param ProductRequest $request
     */
    public function __construct(ProductRequest $request)
    {
        $this->setName($request->get('name'));
        $this->setPrice($request->get('price'));
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    protected function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    protected function setPrice(float $price): void
    {
        $this->price = $price;
    }

}

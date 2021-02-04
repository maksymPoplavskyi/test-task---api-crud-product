<?php


namespace App\DTO;


use App\Http\Requests\Admin\ProductSearchRequest;

class ProductSearchData
{
    /** @var string $name */
    private $name;

    /**
     * ProductSearchData constructor.
     * @param ProductSearchRequest $request
     */
    public function __construct(ProductSearchRequest $request)
    {
        $this->setName($request->get('name'));
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
}

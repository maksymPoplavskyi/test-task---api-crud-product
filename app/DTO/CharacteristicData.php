<?php


namespace App\DTO;


use App\Http\Requests\Admin\CharacteristicRequest;

class CharacteristicData
{
    /** @var string $name */
    private $name;

    public function __construct(CharacteristicRequest $request)
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

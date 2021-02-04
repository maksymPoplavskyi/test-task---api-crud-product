<?php


namespace App\Services\Admin;


use App\DTO\CharacteristicData;
use App\Http\Requests\Admin\CharacteristicRequest;
use App\Models\Characteristic;
use App\Repositories\CharacteristicRepository;

class CharacteristicService
{
    /** @var CharacteristicRepository $characteristicRepository */
    private $characteristicRepository;

    /**
     * CharacteristicService constructor.
     * @param CharacteristicRepository $characteristicRepository
     */
    public function __construct(CharacteristicRepository $characteristicRepository)
    {
        $this->characteristicRepository = $characteristicRepository;
    }

    /**
     * @param $request CharacteristicRequest
     * @return Characteristic
     */
    public function create(CharacteristicRequest $request)
    {
        $dto = new CharacteristicData($request);
        return $this->characteristicRepository->create($dto);
    }
}

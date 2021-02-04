<?php


namespace App\Repositories;


use App\DTO\CharacteristicData;
use App\Models\Characteristic;

class CharacteristicRepository extends BaseRepository
{

    /**
     * @return Characteristic
     */
    public function getModel(): Characteristic
    {
        return Characteristic::getModel();
    }

    /**
     * @param string $name
     * @return int|null
     */
    public function getIdByName(string $name): ?int
    {
        return $this->getModel()::where('name', $name)->first()->id;
    }

    /**
     * @param CharacteristicData $dto
     * @return Characteristic
     */
    public function create(CharacteristicData $dto): Characteristic
    {
        return $this->getModel()::create([
           'name' => $dto->getName()
        ]);
    }
}

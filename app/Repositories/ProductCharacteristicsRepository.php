<?php


namespace App\Repositories;


use App\Models\ProductCharacteristics;

class ProductCharacteristicsRepository extends BaseRepository
{
    /**
     * @return ProductCharacteristics
     */
    public function getModel(): ProductCharacteristics
    {
        return ProductCharacteristics::getModel();
    }

    /**
     * @param int $id
     * @param array $values
     * @param CharacteristicRepository $characteristicRepository
     */
    public function create(int $id, array $values, CharacteristicRepository $characteristicRepository): void
    {
        foreach ($values as $key => $value) {
            $characteristicId = $characteristicRepository->getIdByName($key);
            if ($characteristicId && is_numeric($characteristicId)) {
                $this->getModel()::create([
                    'product_id' => $id,
                    'characteristic_id' => $characteristicId,
                    'value' => $value
                ]);
            }
        }
    }

    /**
     * @param int $id
     * @param array $values
     * @param CharacteristicRepository $characteristicRepository
     */
    public function update(int $id, array $values, CharacteristicRepository $characteristicRepository)
    {
        foreach ($values as $key => $value) {
            $characteristicId = $characteristicRepository->getIdByName($key);

            if ($characteristicId && is_numeric($characteristicId)) {
                $this->getModel()
                    ->where([
                        ['product_id', $id],
                        ['characteristic_id', $characteristicId]])
                    ->update(['value' => $value]);
            }
        }
    }
}

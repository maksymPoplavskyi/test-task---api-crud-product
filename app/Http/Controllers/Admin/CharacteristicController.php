<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CharacteristicRequest;
use App\Services\Admin\CharacteristicService;
use Illuminate\Http\JsonResponse;

class CharacteristicController extends Controller
{
    /** @var CharacteristicService $characteristicService */
    private $characteristicService;

    /**
     * CharacteristicController constructor.
     * @param CharacteristicService $characteristicService
     */
    public function __construct(CharacteristicService $characteristicService)
    {
        $this->characteristicService = $characteristicService;
    }

    /**
     * @param CharacteristicRequest $request
     * @return JsonResponse Product
     */
    public function create(CharacteristicRequest $request)
    {
        return response()->json($this->characteristicService->create($request));
    }
}

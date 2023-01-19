<?php

namespace App\Http\Controllers\Api;

use App\Services\KangarooService;
use App\Http\Resources\KangarooCollection;
use App\Http\Resources\KangarooResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class KangarooApiController
{
    /** @var KangarooService */
    private KangarooService $oService;

    /**
     * @param KangarooService $oService
     */
    public function __construct(KangarooService $oService)
    {
        $this->oService = $oService;
    }

    /**
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        return Response::json(new KangarooCollection($this->oService->getList()), 200);
    }

    /**
     * @param int $iId
     * 
     * @return JsonResponse
     */
    public function getById(int $iId): JsonResponse
    {
        try {
            return Response::json(new KangarooResource($this->oService->getById($iId)), 200);
        } catch (ModelNotFoundException $e) {
            return Response::json(['notfound' => 404], 404);
        }
    }
}

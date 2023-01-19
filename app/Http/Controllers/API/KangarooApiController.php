<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\SaveKangarooRequest;
use App\Services\KangarooService;
use App\Http\Resources\KangarooCollection;
use App\Http\Resources\KangarooResource;
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
        return Response::json(new KangarooResource($this->oService->getById($iId)), 200);
    }

    /**
     * 
     * @param SaveKangarooRequest $oRequest
     * 
     * @return JsonResponse
     */
    public function insert(SaveKangarooRequest $oRequest): JsonResponse
    {
        return Response::json($this->oService->insert($oRequest));
    }

    /**
     * @param int $iId
     * @param SaveKangarooRequest $oRequest
     * 
     * @return JsonResponse
     */
    public function update(int $iId, SaveKangarooRequest $oRequest): JsonResponse
    {
        return Response::json($this->oService->update($iId, $oRequest));
    }

    /**
     * @param int $iId
     * 
     * @return JsonResponse
     */
    public function delete(int $iId): JsonResponse
    {
        return Response::json($this->oService->delete($iId));
    }
}

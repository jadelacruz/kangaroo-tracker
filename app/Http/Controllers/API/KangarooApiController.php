<?php

namespace App\Http\Controllers\Api;

use App\Constants\HttpStatusCode;
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
        return Response::json(
            new KangarooCollection($this->oService->getList()),
            HttpStatusCode::OK
        );
    }

    /**
     * @param int $iId
     * 
     * @return JsonResponse
     */
    public function getById(int $iId): JsonResponse
    {
        return Response::json(
            new KangarooResource($this->oService->getById($iId)),
            HttpStatusCode::OK
        );
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

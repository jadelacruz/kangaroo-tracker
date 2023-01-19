<?php

namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Constants\HttpStatusCode;
use App\Http\Response\HttpErrorResponse;
use App\Http\Response\HttpResponse;
use App\Interface\IRepository;
use App\Models\Kangaroo;
use App\Constants\KangarooConstant as KangarooConst;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KangarooService
{
    /** @var IRepository|\App\Repository\KangarooRepository */
    private IRepository $oRepository;

    public function __construct(private IRepository $oKangarooRepository)
    {
        $this->oRepository = $oKangarooRepository;
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->oRepository->getAll();
    }

    /**
     * @return null|Kangaroo
     */
    public function getById(int $iId): ?Kangaroo
    {
        return $this->oRepository->getOne($iId);
    }

    /**
     * @param Request|\App\Http\Requests\SaveKangarooRequest $oRequest
     * 
     * @return array<string, mixed>
     */
    public function insert(Request $oRequest): array
    {
        try {
            $this->oRepository->insert($oRequest->all());
            return HttpResponse::create(KangarooConst::MSG_INSERT_SUCCESS, HttpStatusCode::OK);
        } catch (QueryException $e) {
            Log::alert($e->getMessage(), $oRequest->all());
            return HttpErrorResponse::create(KangarooConst::MSG_INSERT_FAILED, HttpStatusCode::INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * 
     * @param int                                            $iId
     * @param Request|\App\Http\Requests\SaveKangarooRequest $oRequest
     * 
     * @return array<string, mixed>
     */
    public function update(int $iId, Request $oRequest): array
    {
        try {
            $this->oRepository->getOne($iId);
            return HttpResponse::create(KangarooConst::MSG_UPDATE_SUCCESS, HttpStatusCode::OK);
        } catch (ModelNotFoundException $e) {
            return HttpErrorResponse::create(KangarooConst::MSG_NOT_FOUND, HttpStatusCode::NOT_FOUND);
        } catch (QueryException $e) {
            Log::alert($e->getMessage(), $oRequest->all());
            return HttpErrorResponse::create(KangarooConst::MSG_UPDATE_FAILED, HttpStatusCode::INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * 
     * @param int $iId
     * 
     * @return array<string, mixed>
     * 
     */
    public function delete(int $iId): array
    {
        try {
            $bResult = $this->oRepository->delete($iId);
            if ($bResult === true) {
                return HttpResponse::create(KangarooConst::MSG_DELETE_SUCCESS, HttpStatusCode::OK);
            }
        } catch (ModelNotFoundException $oException) {
            return HttpErrorResponse::create(KangarooConst::MSG_NOT_FOUND, HttpStatusCode::NOT_FOUND);
        } catch (QueryException $e) {
            Log::alert($e->getMessage(), $oRequest->all());
            return HttpErrorResponse::create(KangarooConst::MSG_DELETE_FAILED, HttpStatusCode::INTERNAL_SERVER_ERROR);
        }
    }

}
<?php

namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Constants\HttpStatusCode;
use App\Interface\IRepository;
use App\Models\Kangaroo;
use App\Constants\KangarooConstant as KangarooConst;
use App\Http\Response;


class KangarooService
{
    /** @var IRepository|\App\Repository\KangarooRepository */
    private IRepository $oRepository;

    /**
     * @param IRepository $oKangarooRepository
     */
    public function __construct(IRepository $oKangarooRepository)
    {
        $this->oRepository = $oKangarooRepository;
    }

    /**
     * @return Collection
     */
    public function getList(): Collection
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
     * @return Response
     */
    public function insert(Request $oRequest): Response
    {
        try {
            $this->oRepository->insert($oRequest->all());
            return Response::create(KangarooConst::MSG_INSERT_SUCCESS);
        } catch (QueryException $e) {
            Log::alert($e->getMessage(), $oRequest->all());
            return Response::create(KangarooConst::MSG_INSERT_FAILED, HttpStatusCode::INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * 
     * @param int                                            $iId
     * @param Request|\App\Http\Requests\SaveKangarooRequest $oRequest
     * 
     * @return Response
     */
    public function update(int $iId, Request $oRequest): Response
    {
        try {
            $this->oRepository->update($iId, $oRequest->all());
            return Response::create(KangarooConst::MSG_UPDATE_SUCCESS, HttpStatusCode::OK);
        } catch (ModelNotFoundException $e) {
            return Response::create(KangarooConst::MSG_NOT_FOUND, HttpStatusCode::NOT_FOUND);
        } catch (QueryException $e) {
            Log::alert($e->getMessage(), $oRequest->all());
            return Response(KangarooConst::MSG_UPDATE_FAILED, HttpStatusCode::INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * 
     * @param int $iId
     * 
     * @return Response
     * 
     */
    public function delete(int $iId): Response
    {
        try {
            $this->oRepository->delete($iId);
            return Response::create(KangarooConst::MSG_DELETE_SUCCESS, HttpStatusCode::OK);
        } catch (ModelNotFoundException $e) {
            return Response::create(KangarooConst::MSG_NOT_FOUND, HttpStatusCode::NOT_FOUND);
        } catch (QueryException $e) {
            Log::alert($e->getMessage(), $iId);
            return Response::create(KangarooConst::MSG_DELETE_FAILED, HttpStatusCode::INTERNAL_SERVER_ERROR);
        }
    }

}
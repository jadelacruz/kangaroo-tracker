<?php

namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Constants\HttpStatusCode;
use App\Http\Response\HttpErrorResponse;
use App\Http\Response\HttpResponse;
use App\Interface\IRepository;
use App\Models\Kangaroo;
use App\Constants\KangarooConstant as KangarooConst;

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
        }

        return HttpErrorResponse::create(KangarooConst::MSG_DELETE_FAILED, HttpStatusCode::INTERNAL_SERVER_ERROR);
    }

}
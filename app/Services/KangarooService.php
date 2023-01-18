<?php

namespace App\Services;

use App\Interface\IRepository;
use App\Models\Kangaroo;

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
}
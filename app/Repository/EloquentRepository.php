<?php

namespace App\Repository;

use App\Interface\IRepository;
use Illuminate\Database\Eloquent\Model;

class EloquentRepository implements IRepository
{
    /** @var Model */
    protected Model $oModel;

    /**
     * @param string $sOrder
     * 
     * @return array<int, array>
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getAll(string $sOrder = 'desc'): array
    {
        return $this->oModel
            ->orderBy($this->oModel->getKeyName(), $sOrder)
            ->get()
            ->toArray();
    }

    /**
     * @return Model|object|null
     */
    public function getOne(int $iId): ?object
    {
        return $this->oModel->findOrfail($iId);
    }

    /**
     * @param Model|array $aData
     * 
     * @return Model|object
     */
    public function insert(array $aData): object
    {
        return $this->oModel->create($aData);
    }

    /**
     * @param int         $iId
     * @param Model|array $aData
     * 
     * @return bool
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function update(int $iId, array $aData): bool
    {
        return $this->oModel
                    ->findOrFail($iId)
                    ->update($aData);
    }

    /**
     * @param int $iId
     * 
     * @return bool
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function delete(int $iId): bool
    {
        return $this->oModel
                    ->findOrFail($iId)
                    ->delete($iId);
    }
}
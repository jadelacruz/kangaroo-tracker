<?php

namespace App\Repository;

use App\Interface\IRepository;
use Illuminate\Database\Eloquent\Model;

class EloquentRepository implements IRepository
{
    /** @var Model */
    protected Model $oModel;

    /**
     * @return array<int, array>
     */
    public function getAll(): array
    {
        return $this->oModel->get()->toArray();
    }

    /**
     * @return Model|object|null
     */
    public function getOne(int $iId): ?object
    {
        return $this->oModel->find($iId);
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
     */
    public function delete(int $iId): bool
    {
        return $this->oModel
                    ->findOrFail($iId)
                    ->delete($iId);
    }
}
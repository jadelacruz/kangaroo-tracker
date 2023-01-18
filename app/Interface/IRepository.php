<?php

namespace App\Interface;

interface IRepository
{
    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * @param int $iId
     * 
     * @return null|object
     */
    public function getOne(int $iId): ?object;

    /**
     * @param array $aData
     * 
     * @return object
     */
    public function insert(array $aData): object;

    /**
     * @param int   $iId
     * @param array $aData
     * 
     * @return bool
     */
    public function update(int $iId, array $aData): bool;

    /**
     * @param int $iId
     * 
     * @return bool
     */
    public function delete(int $iId): bool;
}
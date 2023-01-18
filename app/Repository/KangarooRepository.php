<?php

namespace App\Repository;

use App\Models\Kangaroo;

class KangarooRepository extends EloquentRepository
{
    /**
     * @var Kangaroo $oKangarooModel
     */
    public function __construct(Kangaroo $oKangarooModel)
    {
        $this->oModel = $oKangarooModel;
    }
}
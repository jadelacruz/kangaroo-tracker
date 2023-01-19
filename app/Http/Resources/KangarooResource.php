<?php

namespace App\Http\Resources;

use App\Constants\KangarooConstant as KangarooConst;
use App\Models\Kangaroo;
use Illuminate\Http\Resources\Json\JsonResource;

class KangarooResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            KangarooConst::COL_ID         => $this[KangarooConst::COL_ID],
            KangarooConst::COL_NAME       => $this[KangarooConst::COL_NAME],
            KangarooConst::COL_NICKNAME   => $this[KangarooConst::COL_NICKNAME],
            KangarooConst::COL_WEIGHT     => $this[KangarooConst::COL_WEIGHT],
            KangarooConst::COL_HEIGHT     => $this[KangarooConst::COL_HEIGHT],
            KangarooConst::COL_GENDER     => KangarooConst::WORD_CAST_GENDER[ $this[KangarooConst::COL_GENDER] ],
            KangarooConst::COL_COLOR      => $this[KangarooConst::COL_COLOR],
            KangarooConst::COL_NATURE     => empty($this[KangarooConst::COL_NATURE]) 
                ? KangarooConst::WORD_CAST_NATURE_EMPTY : KangarooConst::WORD_CAST_NATURE[ $this[KangarooConst::COL_NATURE] ],
            KangarooConst::COL_BIRTH_DATE => $this[KangarooConst::COL_BIRTH_DATE],
        ];
    }
}

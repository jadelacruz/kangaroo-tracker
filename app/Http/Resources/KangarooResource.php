<?php

namespace App\Http\Resources;

use App\Constants\KangarooConstant as KangarooConst;
use App\Enums\Nature;
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
            KangarooConst::COL_ID         => $this->id,
            KangarooConst::COL_NAME       => $this->name,
            KangarooConst::COL_NICKNAME   => $this->nickname,
            KangarooConst::COL_WEIGHT     => $this->weight,
            KangarooConst::COL_HEIGHT     => $this->height,
            KangarooConst::COL_GENDER     => ucfirst(strtolower($this->gender->name)),
            KangarooConst::COL_COLOR      => $this->color,
            KangarooConst::COL_NATURE     => empty($this->nature) === true ? Nature::EMPTY_VALUE : $this->nature->castToWord(),
            KangarooConst::COL_BIRTH_DATE => $this->birth_date,
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Constants\KangarooConstant as KangarooConst;
use App\Enums\Gender;
use App\Enums\Nature;
use App\Models\Kangaroo;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class SaveKangarooRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            KangarooConst::COL_NAME       => [
                'required',
                'string',
                'min:5',
                'max:25',
                Rule::unique(KangarooConst::DB_TABLE, KangarooConst::COL_NAME)
                    ->ignore(
                        Kangaroo::select(KangarooConst::COL_ID)
                                ->whereName($this->get(KangarooConst::COL_NAME))
                                ->whereId($this->get(KangarooConst::COL_ID))
                                ->first()?->id
                    )
            ],
            KangarooConst::COL_GENDER     => [
                'required',
                new Enum(Gender::class)
            ],
            KangarooConst::COL_NATURE     => [
                'nullable',
                new Enum(Nature::class)
            ],
            KangarooConst::COL_NICKNAME   => 'nullable|min:5|max:10',
            KangarooConst::COL_WEIGHT     => 'required|numeric|min:1',
            KangarooConst::COL_HEIGHT     => 'required|numeric|min:1',
            KangarooConst::COL_COLOR      => 'nullable|min:2|max:50',
            KangarooConst::COL_BIRTH_DATE => 'required|date'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Constants\KangarooConstant as KangarooConst;
use App\Enums\Gender;
use App\Enums\Nature;
use Illuminate\Validation\Rules\Enum;

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
                'unique:App\Models\Kangaroo,name',
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
            KangarooConst::COL_WEIGHT     => 'required|numeric',
            KangarooConst::COL_HEIGHT     => 'required|numeric',
            KangarooConst::COL_COLOR      => 'nullable|min:2|max:50',
            KangarooConst::COL_BIRTH_DATE => 'required|date'
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\KangarooConstant as KangarooConst;
use App\Enums\Gender;
use App\Enums\Nature;

/**
 * App\Models\Kangaroo
 *
 * @property int $id
 * @property string $name
 * @property string|null $nickname
 * @property float $weight
 * @property float $height
 * @property Gender $gender
 * @property string $color
 * @property Nature $nature
 * @property string $birth_date
 * @property string|null $del_timestamp
 * @property string $ins_timestamp
 * @property string|null $upd_timestamp
 * @method static \Illuminate\Database\Eloquent\Builder|Kangaroo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kangaroo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kangaroo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kangaroo whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kangaroo whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kangaroo whereDelTimestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kangaroo whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kangaroo whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kangaroo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kangaroo whereInsTimestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kangaroo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kangaroo whereNature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kangaroo whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kangaroo whereUpdTimestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kangaroo whereWeight($value)
 * @mixin \Eloquent
 */
class Kangaroo extends Model
{
    use HasFactory, SoftDeletes;
    
    /** @var string */
    const DELETED_AT       = KangarooConst::COL_DEDLETE_TS;

    /** @var bool */
    public $timestamps     = false;

    /** @var string */
    protected $table       = KangarooConst::DB_TABLE;

    /** @var string */
    protected $primary_key = KangarooConst::COL_ID;

    /** @var array<string> */
    protected $fillable    = [
        KangarooConst::COL_NAME,
        KangarooConst::COL_NICKNAME,
        KangarooConst::COL_WEIGHT,
        KangarooConst::COL_HEIGHT,
        KangarooConst::COL_GENDER,
        KangarooConst::COL_COLOR,
        KangarooConst::COL_NATURE,
        KangarooConst::COL_BIRTH_DATE
    ];

    /** @var array<string, string> */
    protected $casts       = [
        KangarooConst::COL_GENDER => Gender::class,
        KangarooConst::COL_NATURE => Nature::class
    ];
}

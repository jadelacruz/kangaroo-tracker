<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\KangarooConstant as KangarooConst;
use App\Enums\Gender;
use App\Enums\Nature;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(KangarooConst::DB_TABLE, function (Blueprint $oTable) {
            $oTable->id();
            $oTable->string(KangarooConst::COL_NAME, 25)
                ->unique();
            $oTable->string(KangarooConst::COL_NICKNAME, 10)
                ->nullable()
                ->default(null);
            $oTable->float(KangarooConst::COL_WEIGHT);
            $oTable->float(KangarooConst::COL_HEIGHT);
            $oTable->enum(KangarooConst::COL_GENDER, array_column(Gender::cases(), 'value'));
            $oTable->string(KangarooConst::COL_COLOR, 50)
                ->nullable();
            $oTable->enum(KangarooConst::COL_NATURE, array_column(Nature::cases(), 'value'));
            $oTable->date(KangarooConst::COL_BIRTH_DATE);
            $oTable->softDeletes(KangarooConst::COL_DEDLETE_TS);
            $oTable->datetime(KangarooConst::COL_INSERT_TS)
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $oTable->datetime(KangarooConst::COL_UPDATE_TS)
                ->nullable()
                ->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'));
        });
    }
};

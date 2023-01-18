<?php

namespace App\Constants;

/**
 * Constants declaration
 */
class KangarooConstant
{
    /** DB table name */
    const DB_TABLE        = 'kangaroo';
    
    /** DB column names */
    const COL_ID         = 'id';
    const COL_NAME       = 'name';
    const COL_NICKNAME   = 'nickname';
    const COL_WEIGHT     = 'weight';
    const COL_HEIGHT     = 'height';
    const COL_GENDER     = 'gender';
    const COL_COLOR      = 'color';
    const COL_NATURE     = 'nature';
    const COL_BIRTH_DATE = 'birth_date';
    const COL_INSERT_TS  = 'ins_timestamp';
    const COL_UPDATE_TS  = 'upd_timestamp';
    const COL_DEDLETE_TS = 'del_timestamp';
}
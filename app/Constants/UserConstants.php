<?php

namespace App\Constants;

/**
 * Constants declaration
 */
class UserConstants
{
    /** DB table name */
    const DB_TABLE        = 'user';
    
    /** DB column names */
    const COL_ID          = 'id';
    const COL_FIRST_NAME  = 'first_name';
    const COL_MIDDLE_NAME = 'middle_name';
    const COL_LAST_NAME   = 'last_name';
    const COL_INSERT_TS   = 'ins_timestamp';
    const COL_UPDATE_TS   = 'upd_timestamp';
    const COL_DELETE_TS   = 'del_timestamp';
}
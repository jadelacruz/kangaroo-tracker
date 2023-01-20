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
    const COL_ID                 = 'id';
    const COL_NAME               = 'name';
    const COL_NICKNAME           = 'nickname';
    const COL_WEIGHT             = 'weight';
    const COL_HEIGHT             = 'height';
    const COL_GENDER             = 'gender';
    const COL_COLOR              = 'color';
    const COL_NATURE             = 'nature';
    const COL_BIRTH_DATE         = 'birth_date';
    const COL_INSERT_TS          = 'ins_timestamp';
    const COL_UPDATE_TS          = 'upd_timestamp';

    /** Route constants */
    const ROUTE_PREFIX           = 'kangaroo';

    /** Messages */
    const MSG_NOT_FOUND          = 'No record match found.';
    const MSG_INSERT_SUCCESS     = 'Successfully created the record.';
    const MSG_UPDATE_SUCCESS     = 'Successfully updated the record.';
    const MSG_DELETE_SUCCESS     = 'Successfully deleted the record.';
    const MSG_INSERT_FAILED      = 'An error occurred while trying to create the record';
    const MSG_UPDATE_FAILED      = 'An error occurred while trying to update the record';
    const MSG_DELETE_FAILED      = 'An error occurred while trying to delete the record';
}
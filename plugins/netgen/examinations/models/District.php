<?php namespace Netgen\Examinations\Models;

use Model;

/**
 * Model
 */
class District extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'netgen_examinations_district';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}

<?php namespace Netgen\Examinations\Models;

use Model;

/**
 * Model
 */
class ExaminationType extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'netgen_examinations_type';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}

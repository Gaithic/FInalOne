<?php namespace Netgen\Examinations\Models;

use Model;

/**
 * Model
 */
class School extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'netgen_examinations_schools';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'udise_code' => 'required'
    ];
    public $belongsTo = [
        'district' => District::class,
    ];
}

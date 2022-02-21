<?php namespace Netgen\Scert\Models;

use Model;

/**
 * Model
 */
class GlobalSetting extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'netgen_scert_global_settings';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'email' => 'nullable|email',
        'phone_number' =>'nullable|regex:/^[0-9\-\(\)\/\+\s]*$/|min:10'
    ];

    // relations
    public $attachOne = [
        'site_logo' => 'System\Models\File',
        'hp_logo' => 'System\Models\File',

    ];
}

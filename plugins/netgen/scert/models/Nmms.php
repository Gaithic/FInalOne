<?php namespace Netgen\Scert\Models;

use Model;

/**
 * Model
 */
class Nmms extends Model
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
    public $table = 'netgen_scert_scholarship';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}

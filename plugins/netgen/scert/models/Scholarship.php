<?php namespace Netgen\Scert\Models;

use Model;
use Winter\Storm\Database\Traits\Sortable;

/**
 * Model
 */
class Scholarship extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use Sortable;
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
        'title' => 'required',
        'image' =>'required',
        'description' =>'required'        
    ];
}

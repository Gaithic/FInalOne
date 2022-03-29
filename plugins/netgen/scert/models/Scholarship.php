<?php namespace Netgen\Scert\Models;

use Model;
use Winter\Storm\Database\Traits\Sortable;

/**
 * Model
 */
class Scholarship extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\Sluggable;
    use Sortable;
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

      /**
     * @var array Generate slugs for these attributes.
     */
    protected $slugs = ['slug' => 'title'];


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

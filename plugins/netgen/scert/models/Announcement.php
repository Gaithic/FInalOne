<?php namespace Netgen\Scert\Models;

use Model;

/**
 * Model
 */
class Announcement extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\Sluggable;
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    protected $slugs = ['slug' => 'title'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'netgen_scert_announcements';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => 'required',
        'description' => 'required_if:is_open_file,0',
        'date' => 'required',
        

    ];
}

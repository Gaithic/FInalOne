<?php namespace Netgen\Scert\Models;

use Model;

/**
 * Model
 */
class Announcement extends Model
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
    public $table = 'netgen_scert_announcements';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => 'required',
        'description' => 'required_if:is_open_file,0',
        'date' => 'required',
        'file' =>'required_if:is_open_file,1'

    ];
}

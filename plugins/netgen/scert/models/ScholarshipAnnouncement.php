<?php namespace Netgen\Scert\Models;

use Model;

/**
 * Model
 */
class ScholarshipAnnouncement extends Model
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
    public $table = 'netgen_scert_scholarship_announcement';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * 
     *  Get Category
     * 
     */
    public $belongsTo = [
        'category' => Category::class
    ];


}

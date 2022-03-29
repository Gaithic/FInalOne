<?php namespace Netgen\Scert\Models;

use Model;

/**
 * Model
 */
class ScholarshipExamination extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\Sluggable;
    
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
    public $table = 'netgen_scert_scholarship_examinations';


    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => 'required',
        'date' => 'required',
        'category' => 'required'
    ];

    public $belongsTo = [
        'category' => Category::class
    ];
}

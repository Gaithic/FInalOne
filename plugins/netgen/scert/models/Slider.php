<?php namespace Netgen\Scert\Models;

use Model;
use Winter\Storm\Database\Traits\Sortable;

/**
 * Model
 */
class Slider extends Model
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
    public $table = 'netgen_scert_slider';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'slide_title' => 'required',
        'slide_image' => 'required|mimes:jpeg,bmp,png',
        'slide_image_mobile' => 'required|mimes:jpeg,bmp,png',
        

    ];

  
}

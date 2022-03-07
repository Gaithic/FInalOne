<?php namespace Netgen\Examinations\Models;

use Illuminate\Support\Facades\App;
use Model;
use Netgen\Examinations\Classes\ExaminationFormController;
use Renatio\DynamicPDF\Classes\PDF;

/**
 * Model
 */
class ExamForm extends Model
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
    public $table = 'netgen_examinations_form';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'school' => School::class,
        'examination' => ExaminationType::class
    ];

    /**
     * 
     *  On After Save
     * 
     */
    public function afterSave(){
        if(App::runningInBackend()) {
            (new ExaminationFormController)->formAfterUpdate($this);
        }
    }
  

    
}

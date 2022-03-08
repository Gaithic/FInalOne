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
        'name' => 'required',
        'father_name' => 'required',
        'mother_name' =>'required',
        'sex' => 'required',
        'medium_of_examination' => 'required',
        'mobile_number_of_parent' => 'required|regex:/^[0-9+ ]{10,10}+$/',
        'roll_number' => 'required|unique:netgen_examinations_form,roll_number',
        'school_id' => 'required',
        'examination_id' => 'required',
        'email' =>'required|email'
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

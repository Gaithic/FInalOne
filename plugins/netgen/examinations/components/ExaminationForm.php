<?php namespace Netgen\Examinations\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Input;
use Netgen\Examinations\Models\ExamForm;
use Netgen\Examinations\Models\ExaminationType;
use Netgen\Examinations\Models\School;
use Netgen\Scert\Models\GlobalSetting;
use Winter\Storm\Exception\ValidationException;

class ExaminationForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'=>"Examination Form",
            'description'=> 'Enter examination data'
        ];
    }


    public function onSave(){
        $data = post();
        $rules = [
                'name' => 'required',
                'father_name' => 'required',
                'mother_name' =>'required',
                'sex' => 'required',
                'medium_of_examination' => 'required',
                'mobile_number_of_parent' => 'required',
                'roll_number' => 'required|unique:netgen_examinations_form,roll_number',
                'school_type_id' => 'required',
                'examination_type_id' => 'required'
            ];
        $validator = Validator::make($data, $rules);

        if($validator->fails()){
            throw new ValidationException($validator);
        }else{
            $examForm = new ExamForm();
            $examForm->name = Input::get('name');
            $examForm->father_name = Input::get('father_name');
            $examForm->mother_name = Input::get('mother_name');
            $examForm->medium_of_examination = Input::get('medium_of_examination');
            $examForm->mobile_number_of_parent = Input::get('mobile_number_of_parent');
            $examForm->roll_number = Input::get('roll_number');
            $examForm->sex = Input::get('sex');
            $examForm->school_type_id = Input::get('school_type_id');
            $examForm->examination_type_id = Input::get('examination_type_id');
            $examForm->save();    
        }
       
    }
     /**
     * List of School name 
     * 
     */
    public function schoolList(){
        $schoolname = School::get();
        return $schoolname;
    }
    /**
     * List of examination
     */
    public function examinationList(){
        $examinationList = ExaminationType::get();
        return $examinationList;
    }


}

<?php namespace Netgen\Examinations\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Input;
use Netgen\Examinations\Models\ExamForm;
use Netgen\Examinations\Models\ExaminationType;
use Netgen\Examinations\Models\School;
use Netgen\Examinations\Models\District;
use Netgen\Scert\Models\GlobalSetting;
use RainLab\User\Facades\Auth;
use Winter\Storm\Support\Facades\Flash;
use ValidationException;
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
        $user = Auth::getUser();
        $rules = [
                'name' => 'required',
                'father_name' => 'required',
                'mother_name' =>'required',
                'sex' => 'required',
                'medium_of_examination' => 'required',
                'mobile_number_of_parent' => 'required|regex:/^[0-9+ ]{10,10}+$/',
                'roll_number' => 'required|unique:netgen_examinations_form,roll_number',
                'school_id' => 'required',
                'examination_id' => 'required',
                'email' =>'required|email',
                'district_id' => 'required',
            ];
        $validation = Validator::make($data, $rules);

        if($validation->fails()){
            throw new ValidationException($validation);
        }else{
            $examForm = new ExamForm();
            $examForm->name = Input::get('name');
            $examForm->father_name = Input::get('father_name');
            $examForm->mother_name = Input::get('mother_name');
            $examForm->medium_of_examination = Input::get('medium_of_examination');
            $examForm->mobile_number_of_parent = Input::get('mobile_number_of_parent');
            $examForm->roll_number = Input::get('roll_number');
            $examForm->sex = Input::get('sex');
            $examForm->school_id = Input::get('school_id');
            $examForm->examination_id = Input::get('examination_id');
            $examForm->email = Input::get('email');
            $examForm->user_id = $user->id;
            $examForm->district_id = Input::get('district_id');
            $examForm->save();   
            
            Flash::success('Form has been submitted!'); 
            
            return Redirect::to('/dashboard');
            
        }
       
    }
    /**
     * 
     * List of District
     * 
     * 
     */
    
    public function districtList(){
        $districtList = District::get();
        return $districtList;
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

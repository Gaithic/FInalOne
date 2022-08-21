<?php namespace Netgen\Extenduser\Components;

use Cms\Classes\ComponentBase;
use RainLab\User\Components\Account as UserAccount;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Winter\Storm\Support\Facades\Flash;
use Input;
use DB;

class AccoutnExtend extends UserAccount
{
    public function componentDetails()
    {
        return [
            'name'        => 'AccoutnExtend Component',
            'description' => 'No description provided yet...'
        ];
    }

    // public function defineProperties()
    // {
    //     return [];
    // }

    public function onRegister() {
        $email = Input::get('email');
        $mobile = Input::get('contact');
        $academicYear = date('Y');
        $checkEmail = DB::table('users')->where('email',$email)->value('academic_year');
        $checkMobile = DB::table('users')->where('contact',$mobile)->value('academic_year');
        if($checkEmail == $academicYear){
            Flash::error('Email already exist for this Academic Session, Kindly try with the same in the Next Academic Session...');
        }else{
            if($checkMobile == $academicYear){
                Flash::error('Contact Number already exist for this Academic Session, Kindly try with the same in the Next Academic Session...');

            }else{
                if($redirect = parent::onRegister()){
                    return parent::onSignin();
                }
                $user = $this->user();
                return $redirect;
            }
        }
    //     $redirect = parent::onRegister();

    //     $user = $this->user();
    //    return $redirect;
    }


}

<?php namespace Netgen\Extenduser;

use RainLab\User\Controllers\Users as userController;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return ([
            'Netgen\ExtendUser\Components\UserRegistration' => 'Registration',
            'Netgen\ExtendUser\Components\Login' => 'UserLogin',
            'Netgen\ExtendUser\Components\AccoutnExtend' => 'account',
            'Netgen\Extenduser\Components\Session' => 'Session',
            'Netgen\Extenduser\Components\AccoutnExtendLogin' => 'LoginExtend',
        ]);
    }

    public function registerSettings()
    {
    }

    public function boot(){
        userController::extendFormFields(function($form, $model){

            $form->addFields([
                'fathername' => [
                        'label' => 'fathername',
                        'tab'=> 'Account',
                        'type' => 'text'
                    ],
                    'mothername' => [
                        'label' => 'mothername',
                        'tab'=> 'Account',
                        'type' => 'text'
                    ],
                    'academic_year' => [
                        'label' => 'academic_year',
                        'tab'=> 'Account',
                        'type' => 'text'
                    ],
                    'contact' => [
                        'label' => 'contact',
                        'tab'=> 'Account',
                        'type' => 'text'
                    ],
                    'gender' => [
                        'label' => 'gender',
                        'tab'=> 'Account',
                        'type' => 'text'
                    ],
                ]);
       });
    }
}

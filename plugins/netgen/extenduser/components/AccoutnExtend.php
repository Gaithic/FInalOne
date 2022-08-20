<?php namespace Netgen\Extenduser\Components;

use Cms\Classes\ComponentBase;
use RainLab\User\Components\Account as UserAccount;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Winter\Storm\Support\Facades\Flash;

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
        $redirect = parent::onRegister();

        $user = $this->user();
       return $redirect;
    }


}

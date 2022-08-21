<?php namespace Netgen\Extenduser\Components;

use Cms\Classes\ComponentBase;
use RainLab\User\Components\Account as UserAccount;
class AccoutnExtendLogin extends UserAccount
{
    public function componentDetails()
    {
        return [
            'name'        => 'AccoutnExtendLogin Component',
            'description' => 'No description provided yet...'
        ];
    }

     public function onSignin()
    {
        $redirect = parent::onSignin();
        $user = $this->user();
        return $redirect;
    }
}
